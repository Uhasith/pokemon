<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeAllSet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_all_sets';

    protected $casts = [
        'images' => 'array',
        'legalities' => 'array',
        'printed_total' => 'integer',
        'release_date' => 'date',
        'updated_at' => 'datetime',
    ];
}
