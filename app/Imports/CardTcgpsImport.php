<?php

namespace App\Imports;

use App\Models\CardTcgp;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Log;

class CardTcgpsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Log::info($row);
        return new CardTcgp([
            'tcgp_id' => $row['tcg_id'] ?? null,  // assuming you have the tcgp_id
            'card_id' => $row['card_id'] ?? null,
            'abilities' => isset($row['abilities']) ? json_encode($row['abilities']) : null,
            'artist' => $row['artist'] ?? null,
            'ancient_trait' => $row['ancientTrait'] ?? null,
            'attacks' => isset($row['attacks']) ? json_encode($row['attacks']) : null,
            'card_market' => isset($row['cardmarket']) ? json_encode($row['cardmarket']) : null,
            'converted_retreat_cost' => is_numeric($row['convertedRetreatCost'] ?? null) ? $row['convertedRetreatCost'] : null,
            'evolves_from' => $row['evolvesFrom'] ?? null,
            'flavor_text' => $row['flavorText'] ?? null,
            'hp' => is_numeric($row['hp'] ?? null) ? $row['hp'] : null,
            'id_number' => $row['id_number'] ?? null,
            'images' => isset($row['images']) ? json_encode($row['images']) : null,
            'legalities' => isset($row['legalities']) ? json_encode($row['legalities']) : null,
            'regulation_mark' => $row['regulationMark'] ?? null,
            'name' => $row['name'] ?? null,
            'national_pokedex_numbers' => isset($row['nationalPokedexNumbers']) ? json_encode($row['nationalPokedexNumbers']) : null,
            'number' => is_numeric($row['number'] ?? null) ? $row['number'] : null,
            'rarity' => $row['rarity'] ?? null,
            'resistances' => isset($row['resistances']) ? json_encode($row['resistances']) : null,
            'retreat_cost' => isset($row['retreatCost']) ? json_encode($row['retreatCost']) : null,
            'rules' => isset($row['rules']) ? json_encode($row['rules']) : null,
            'set' => isset($row['set']) ? json_encode($row['set']) : null,
            'subtypes' => isset($row['subtypes']) ? json_encode($row['subtypes']) : null,
            'supertype' => $row['supertype'] ?? null,
            'tcgplayer' => isset($row['tcgplayer']) ? json_encode($row['tcgplayer']) : null,
            'types' => isset($row['types']) ? json_encode($row['types']) : null,
            'weaknesses' => isset($row['weaknesses']) ? json_encode($row['weaknesses']) : null,
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
