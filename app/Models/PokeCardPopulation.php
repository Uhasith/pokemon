<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeCardPopulation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_populations';

    protected $casts = [
        'date_checked' => 'date',
    ];
}
