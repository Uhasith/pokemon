<?php

namespace App\Actions\Cards;

class GetCardPopulationPrices
{
    /**
     * Create a new class instance.
     */
    protected $getCardLatestFairPriceAction;

    public function __construct()
    {
        $this->getCardLatestFairPriceAction = new GetCardLatestFairPrice;
    }

    /**
     * Populate prices array with the latest fair prices
     */
    public function handle(array $cardPricesTimeseries): array
    {
        // Initialize prices array with default values of '-'
        $prices = array_map(fn () => '-', array_flip(['PSA10', 'PSA9', 'PSA8', 'PSA7', 'PSA6', 'PSA5', 'PSA4', 'PSA3', 'PSA2', 'PSA1']));

        foreach ($cardPricesTimeseries as $price) {
            $psaGrade = 'PSA'.$price['psa_grade'];

            if (isset($prices[$psaGrade])) {
                $latestFairPrice = $this->getCardLatestFairPriceAction->handle($price['timeseries_data'] ?? []);

                if (! is_null($latestFairPrice)) {
                    $prices[$psaGrade] = '$ '.round($latestFairPrice, 2); // Rounding to 2 decimals
                }
            }
        }

        return $prices;
    }
}
