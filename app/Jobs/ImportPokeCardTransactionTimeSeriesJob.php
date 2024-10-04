<?php

namespace App\Jobs;

use App\Models\PokeCardTransactionTimeSeries;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPokeCardTransactionTimeSeriesJob implements ShouldQueue
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
            // Insert the data into the database
            PokeCardTransactionTimeSeries::updateOrCreate(['card_id' => $row['CardId'], 'psa_grade' => $row['Grade']], [
                'card_id' => $row['CardId'],
                'psa_grade' => $row['Grade'],
                'timeseries_data' => $row['timeseries_prices'],
            ]);
        }
    }
}
