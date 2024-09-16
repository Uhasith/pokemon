<?php

namespace App\Jobs;

use App\Models\PokeCardPrice;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportPokeCardPricesJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $chunk;

    /**
     * Create a new job instance.
     */
    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        foreach ($this->chunk as $cardUuid => $prices) {
            // Separate cardUuid into ID and grade
            $parts = explode('_', $cardUuid);
            $cardId = $parts[0]; // The first part is the ID
            $grade = $parts[1] ?? null; // The second part is the grade, or null if not present
            foreach ($prices as $priceData) {
                // Insert the data into the database
                PokeCardPrice::create([
                    'card_id' => $cardId,
                    'psa_grade' => $grade,
                    'date' => $priceData['date'],
                    'fair_price' => $priceData['fair_price'],
                    'low_price' => $priceData['low_price'],
                    'high_price' => $priceData['high_price'],
                    'price_type' => $priceData['price_type'],
                    'confidence' => $priceData['confidence'],
                ]);
            }
        }
    }
}
