<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PokeCardPrice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_prices';

    protected $casts = [
        'lot_id' => 'integer',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(PokeCard::class);
    }
}
