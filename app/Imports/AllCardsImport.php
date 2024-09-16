<?php

namespace App\Imports;

use App\Models\CardTcgp;
use App\Models\PokeAllCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Log;

class AllCardsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Log::info($row);
        return new PokeAllCard([
            'tcgp_id' => $row['tcg_id'] ?? null,  // assuming you have the tcgp_id
            'card_id' => $row['card_id'] ?? null,
            'abilities' => $row['abilities'] ?? null,
            'artist' => $row['artist'] ?? null,
            'ancient_trait' => $row['ancientTrait'] ?? null,
            'attacks' => $row['attacks'] ?? null,
            'card_market' => $row['cardmarket'] ?? null,
            'converted_retreat_cost' => is_numeric($row['convertedRetreatCost'] ?? null) ? $row['convertedRetreatCost'] : null,
            'evolves_from' => $row['evolvesFrom'] ?? null,
            'flavor_text' => $row['flavorText'] ?? null,
            'hp' => is_numeric($row['hp'] ?? null) ? $row['hp'] : null,
            'id_number' => $row['id_number'] ?? null,
            'images' => $row['images'] ?? null,
            'legalities' => $row['legalities'] ?? null,
            'regulation_mark' => $row['regulationMark'] ?? null,
            'name' => $row['name'] ?? null,
            'national_pokedex_numbers' => $row['nationalPokedexNumbers'] ?? null,
            'number' => is_numeric($row['number'] ?? null) ? $row['number'] : null,
            'rarity' => $row['rarity'] ?? null,
            'resistances' => $row['resistances'] ?? null,
            'retreat_cost' => $row['retreatCost'] ?? null,
            'rules' => $row['rules'] ?? null,
            'set' => $row['set'] ?? null,
            'subtypes' => $row['subtypes'] ?? null,
            'supertype' => $row['supertype'] ?? null,
            'tcgplayer' => $row['tcgplayer'] ?? null,
            'types' => $row['types'] ?? null,
            'weaknesses' => $row['weaknesses'] ?? null,
            'set_series' => $row['set_series'] ?? null,
            'set_name' => $row['set_name'] ?? null,
            'set_id' => $row['set_id'] ?? null,
            'set_printed_total' => is_numeric($row['set_printedTotal'] ?? null) ? $row['set_printedTotal'] : null,
        ]);
    }

    public function batchSize(): int
    {
        return 250;
    }

    public function chunkSize(): int
    {
        return 250;
    }
}
