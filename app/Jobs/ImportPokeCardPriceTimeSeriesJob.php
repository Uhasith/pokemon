<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use App\Models\PokeCardPriceTimeSeries;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImportPokeCardPriceTimeSeriesJob implements ShouldQueue
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
        foreach ($this->chunk as $row) {
            // Get the timeseries prices
            $timeseriesPrices = $row['timeseries_prices'];

            // Create the new record in the database with the latest record data
            PokeCardPriceTimeSeries::updateOrCreate(['card_id' => $row['CardId'], 'psa_grade' => $row['Grade']], [
                'card_id' => $row['CardId'],
                'psa_grade' => $row['Grade'],
                'latest_fair_price' => $row['latest_fair_price'],
                'latest_low_price' => $row['latest_low_price'],
                'latest_high_price' => $row['latest_high_price'],
                'latest_price_type' => $row['latest_price_type'],
                'latest_confidence' => $row['latest_confidence'],
                'timeseries_data' => $timeseriesPrices
            ]);
        }
    }
}
