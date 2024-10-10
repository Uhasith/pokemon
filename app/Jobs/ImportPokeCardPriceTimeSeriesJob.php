<?php

namespace App\Jobs;

use App\Models\PokeCardPriceTimeSeries;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPokeCardPriceTimeSeriesJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $chunk;

    public $tries = 3;

    public $timeout = 12000;

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
            PokeCardPriceTimeSeries::updateOrCreate(
                ['card_id' => $row['CardId'], 'psa_grade' => $row['Grade']],
                [
                    'card_id' => $row['CardId'],
                    'psa_grade' => $row['Grade'],
                    'latest_fair_price' => floatval(str_replace(',', '', $row['latest_fair_price'])),
                    'latest_low_price' => floatval(str_replace(',', '', $row['latest_low_price'])),
                    'latest_high_price' => floatval(str_replace(',', '', $row['latest_high_price'])),
                    'latest_price_type' => $row['latest_price_type'],
                    'latest_confidence' => floatval(str_replace(',', '', $row['latest_confidence'])),
                    'timeseries_data' => $timeseriesPrices,
                ]
            );
        }
    }
}
