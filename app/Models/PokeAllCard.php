<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeAllCard extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_all_cards';

    protected $casts = [
        'abilities' => 'array',
        'ancient_trait' => 'array',
        'attacks' => 'array',
        'card_market' => 'array',
        'images' => 'array',
        'legalities' => 'array',
        'national_pokedex_numbers' => 'array',
        'resistances' => 'array',
        'retreat_cost' => 'array',
        'rules' => 'array',
        'set' => 'array',
        'subtypes' => 'array',
        'tcgplayer' => 'array',
        'types' => 'array',
        'weaknesses' => 'array',
    ];
}
