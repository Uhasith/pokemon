<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_scraped' => 'date',
        'is_holo' => 'boolean',
        'is_reverse_holo' => 'boolean',
    ];

    public function tcgp(): HasOne
    {
        return $this->hasOne(CardTcgp::class, 'card_id', 'card_id');
    }
}
