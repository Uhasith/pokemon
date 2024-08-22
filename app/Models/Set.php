<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'release_date' => 'date',
        'last_pop_updated' => 'date',
        'is_promo' => 'boolean',
    ];
}
