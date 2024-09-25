<?php

namespace App\Actions\Cards;

class GetCardPopulationData
{
    /**
     * Create a new class instance.
     */
    public function handle($population): array
    {
        return [
            'PSA10' => $population->pop10 ?? 0,
            'PSA9' => $population->pop9 ?? 0,
            'PSA8' => $population->pop8 ?? 0,
            'PSA7' => $population->pop7 ?? 0,
            'PSA6' => $population->pop6 ?? 0,
            'PSA5' => $population->pop5 ?? 0,
            'PSA4' => $population->pop4 ?? 0,
            'PSA3' => $population->pop3 ?? 0,
            'PSA2' => $population->pop2 ?? 0,
            'PSA1' => $population->pop1 ?? 0,
        ];
    }
}
