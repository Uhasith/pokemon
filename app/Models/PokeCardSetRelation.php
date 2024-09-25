<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PokeCardSetRelation extends Pivot
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_set_relations';

    // Relationship to PokeCard
    public function card(): BelongsTo
    {
        return $this->belongsTo(PokeCard::class, 'card_id', 'card_id');  
    }

    // Relationship to PokeSet
    public function set(): BelongsTo
    {
        return $this->belongsTo(PokeSet::class, 'set_id', 'set_id');  
    }
}
