<?php

namespace App\Jobs;

use App\Models\PokeAllCard;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPokeAllCardsJob implements ShouldQueue
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

            $data = [
                'tcg_id' => $row['id'] ?? null,
                'abilities' => is_array($row['abilities']) ? $row['abilities'] : null,
                'artist' => $row['artist'] ?? null,
                'ancient_trait' => is_array($row['ancientTrait']) ? $row['ancientTrait'] : [],
                'attacks' => is_array($row['attacks']) ? $row['attacks'] : [],
                'card_market' => is_array($row['cardmarket']) ? $row['cardmarket'] : [],
                'converted_retreat_cost' => is_numeric($row['convertedRetreatCost'] ?? null) ? $row['convertedRetreatCost'] : null,
                'evolves_from' => $row['evolvesFrom'] ?? null,
                'flavor_text' => $row['flavorText'] ?? null,
                'hp' => is_numeric($row['hp'] ?? null) ? $row['hp'] : null,
                'images' => is_array($row['images']) ? $row['images'] : [],
                'legalities' => is_array($row['legalities']) ? $row['legalities'] : [],
                'regulation_mark' => $row['regulationMark'] ?? null,
                'name' => $row['name'] ?? null,
                'national_pokedex_numbers' => is_array($row['nationalPokedexNumbers']) ? $row['nationalPokedexNumbers'] : [],
                'number' => is_numeric($row['number'] ?? null) ? $row['number'] : null,
                'rarity' => $row['rarity'] ?? null,
                'resistances' => is_array($row['resistances']) ? $row['resistances'] : [],
                'retreat_cost' => is_array($row['retreatCost']) ? $row['retreatCost'] : [],
                'rules' => is_array($row['rules']) ? $row['rules'] : [],
                'set' => is_array($row['set']) ? $row['set'] : [],
                'subtypes' => is_array($row['subtypes']) ? $row['subtypes'] : [],
                'supertype' => $row['supertype'] ?? null,
                'tcgplayer' => is_array($row['tcgplayer']) ? $row['tcgplayer'] : [],
                'types' => is_array($row['types']) ? $row['types'] : [],
                'weaknesses' => is_array($row['weaknesses']) ? $row['weaknesses'] : [],
                'set_series' => $row['set_series'] ?? null,
                'set_name' => $row['set_name'] ?? null,
                'set_id' => $row['set_id'] ?? null,
                'set_printed_total' => is_numeric($row['set_printedTotal'] ?? null) ? $row['set_printedTotal'] : null,
            ];
            // Insert the data into the database
            PokeAllCard::create($data);
        }
    }
}
