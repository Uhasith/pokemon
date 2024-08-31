<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_scraped' => 'date',
        'is_holo' => 'boolean',
        'is_reverse_holo' => 'boolean',
    ];
}
