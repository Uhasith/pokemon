<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PokeCardPrice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_prices';

    public function card(): BelongsTo
    {
        return $this->belongsTo(PokeCard::class);
    }
}
