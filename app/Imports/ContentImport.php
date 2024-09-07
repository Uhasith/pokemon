<?php

namespace App\Imports;

use App\Models\Content;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ContentImport implements ShouldQueue, ToModel, WithBatchInserts, WithChunkReading, WithEvents, WithHeadingRow
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

                $excelMapping[$dbColumn] = $value;
            }
        }

        $content_id = $excelMapping['content_id'] ?? null;

        if ($content_id === null) {
            // Log an error and skip processing this row
            Log::error('Content Id is missing for a row, skipping the row.', ['row' => $row]);
            return null; // Skip this row
        }

        // Filter out null and empty string values from the $excelMapping array
        $filteredExcelMapping = array_filter($excelMapping, function ($value) {
            return $value !== null && $value !== '';
        });

        // Attempt to find the content by content Id or any alternative identifiers
        $content = Content::where('content_id', $content_id)->first();

        if ($content) {
            // Update the existing set
            $content->update($filteredExcelMapping);
        } else {
            // Create a new set if no conflicts
            Content::create($filteredExcelMapping);
        }

        return null; // Return null because database insertion is handled manually
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                $exceptionMessage = $event->getException()->getMessage();
                Log::error('Failed to import row: ' . $exceptionMessage);
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
