<?php

namespace App\Actions\Cards;

use DateTime;

class GetCardLatestFairPrice
{
    /**
     * Create a new class instance.
     */
    public function handle(array $timeseriesData): mixed
    {
        $latestDate = null;
        $latestFairPrice = null;

        foreach ($timeseriesData as $timeSeriesPrice) {
            $currentDate = new DateTime($timeSeriesPrice['date']);

            if (is_null($latestDate) || $currentDate > $latestDate) {
                $latestDate = $currentDate;
                $latestFairPrice = $timeSeriesPrice['fair_price'];
            }
        }

        return $latestFairPrice;
    }
}
