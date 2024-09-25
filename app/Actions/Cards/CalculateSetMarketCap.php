<?php

namespace App\Actions\Cards;

use App\Models\PokeSet;

class CalculateSetMarketCap
{
    protected $getCardLatestFairPriceAction;

    public function __construct()
    {
        $this->getCardLatestFairPriceAction = new GetCardLatestFairPrice(); // Inject the GetCardLatestFairPrice action
    }

    /**
     * Calculate the market cap for a given set ID
     *
     * @param int $setId
     * @return array
     */
    public function handle(string $setId): array
    {
        // Retrieve the set with related cards and price timeseries
        $set = PokeSet::with([
            'cards.price_timeseries',
            'cards.transaction_timeseries'
        ])->where('set_id', $setId)->first();

        $cards = $set->cards;

        // Initialize total market cap and cards market cap as arrays
        $totalSetMarketCap = 0;
        $setCardsMarketCap = [];
        $totalVolume = 0;
        $cardsVolume = [];

        foreach ($cards as $card) {
            $cardPricesTimeseries = $card->price_timeseries;
            $cardPricesTransactionTimeseries = $card->transaction_timeseries;

            foreach ($cardPricesTimeseries as $price) {
                $psaGrade = 'PSA' . $price['psa_grade'];

                // Initialize the setCardsMarketCap for the specific PSA grade if not set
                if (!isset($setCardsMarketCap[$psaGrade])) {
                    $setCardsMarketCap[$psaGrade] = 0;
                }

                // Get the latest fair price from the time series data
                $latestFairPrice = $this->getCardLatestFairPriceAction->handle($price['timeseries_data'] ?? []);

                // Add to total and per-PSA market cap only if there's a valid fair price
                if (!is_null($latestFairPrice)) {
                    $setCardsMarketCap[$psaGrade] += round($latestFairPrice, 2);
                    $totalSetMarketCap += round($latestFairPrice, 2);
                }
            }

            // foreach ($cardPricesTransactionTimeseries as $transaction) {
            //     $psaGrade = 'PSA' . $transaction['psa_grade'];

            //     // Initialize the setCardsMarketCap for the specific PSA grade if not set
            //     if (!isset($setCardsMarketCap[$psaGrade])) {
            //         $cardsVolume[$psaGrade] = 0;
            //     }

            //     // Get the latest fair price from the time series data
            //     $latestFairPrice = $this->getCardLatestFairPriceAction->handle($transaction['timeseries_data'] ?? []);

            //     // Add to total and per-PSA market cap only if there's a valid fair price
            //     if (!is_null($latestFairPrice)) {
            //         $cardsVolume[$psaGrade] += round($latestFairPrice, 2);
            //         $totalVolume += round($latestFairPrice, 2);
            //     }
            // }
        }

        // Return the calculated market caps
        return [
            'totalSetMarketCap' => $totalSetMarketCap,
            'setCardsMarketCap' => $setCardsMarketCap,
            'set' => $set
        ];
    }
}
