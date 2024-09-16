<?php

namespace App\Imports;

use App\Models\PokeCardPrice;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\ImportFailed;

class PricesImport implements ShouldQueue, ToModel, WithBatchInserts, WithChunkReading, WithEvents, WithHeadingRow
{
    protected $columnMappings;

    public $timeout = 12000;

    public function __construct(array $columnMappings)
    {
        $this->columnMappings = $columnMappings;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $excelMapping = [];

        foreach ($this->columnMappings as $dbColumn => $excelColumnIndex) {
            if ($dbColumn !== 'id') {
                $value = $row[$excelColumnIndex] ?? null;

                if ($value !== null) {
                    try {
                        if (in_array($dbColumn, ['sale_date']) && ! empty($value)) {
                            // Format the date to a standardized format (e.g., Y-m-d)
                            $value = Carbon::parse($value)->format('Y-m-d');
                        }
                    } catch (\Exception $e) {
                        // Log the exception for debugging purposes
                        Log::error("Failed to parse date for $dbColumn with value: $value", ['exception' => $e]);
                        $value = null; // Set value to null if parsing fails
                    }
                }

                $excelMapping[$dbColumn] = $value;
            }
        }

        $price_id = $excelMapping['price_id'] ?? null;
        $card_id = $excelMapping['card_id'] ?? null;

        if ($price_id === null || $card_id === null) {
            // Log an error and skip processing this row
            Log::error('Price Id or Card Id is missing for a row, skipping the row.', ['row' => $row]);

            return null; // Skip this row
        }

        // Filter out null and empty string values from the $excelMapping array
        $filteredExcelMapping = array_filter($excelMapping, function ($value) {
            return $value !== null && $value !== '';
        });

        // Attempt to find the set by Set Id or any alternative identifiers
        $set = PokeCardPrice::where('price_id', $price_id)->where('card_id', $card_id)->first();

        if ($set) {
            // Update the existing set
            $set->update($filteredExcelMapping);
        } else {
            // Create a new set if no conflicts
            PokeCardPrice::create($filteredExcelMapping);
        }

        return null; // Return null because database insertion is handled manually
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                $exceptionMessage = $event->getException()->getMessage();
                Log::error('Failed to import row: '.$exceptionMessage);
            },
        ];
    }

    public function batchSize(): int
    {
        return 250;
    }

    public function chunkSize(): int
    {
        return 250;
    }

    public static function afterImport(AfterImport $event) {}
}
