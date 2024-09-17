<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class PokeCard extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_cards';

    protected $casts = [
        'last_scraped' => 'date',
        'is_holo' => 'boolean',
        'is_reverse_holo' => 'boolean',
    ];

    public function tcg(): HasOne
    {
        return $this->hasOne(PokeCardTcgPCRelation::class, 'card_id', 'card_id');
    }

    public function all_card(): HasOneThrough
    {
        return $this->hasOneThrough(
            PokeAllCard::class, // Final model to retrieve (PokeAllCard)
            PokeCardTcgPCRelation::class, // Intermediate model (PokeCardTcgPCRelation)
            'card_id', // Foreign key on PokeCardTcgPCRelation (linking to PokeCard)
            'tcg_id', // Foreign key on PokeAllCard (linking to PokeCardTcgPCRelation)
            'card_id', // Local key on PokeCard (linking to PokeCardTcgPCRelation)
            'tcg_id'  // Local key on PokeCardTcgPCRelation (linking to PokeAllCard)
        );
    }

    public function price_timeseries(): HasMany
    {
        return $this->hasMany(PokeCardPriceTimeSeries::class, 'card_id', 'card_id');
    }

    public function card_prices(): HasMany
    {
        return $this->hasMany(PokeCardPrice::class, 'card_id', 'card_id');
    }

    public function populations(): HasMany
    {
        return $this->hasMany(PokeCardPopulation::class, 'card_id', 'card_id');
    }
}
