<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardTcgp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'abilities' => 'array',
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
