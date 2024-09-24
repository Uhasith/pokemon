<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PokeSet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_sets';

    protected $casts = [
        'release_date' => 'date',
        'last_pop_updated' => 'date',
        'is_promo' => 'boolean',
    ];

    public function all_set(): HasOne
    {
        return $this->hasOne(PokeSet::class, 'set_id', 'set_id');
    }

    public function cards(): HasMany
    {
        return $this->hasMany(PokeCard::class, 'set_id', 'set_id');
    }

    public function related_cards(): BelongsToMany
    {
        return $this->belongsToMany(
            PokeCard::class,               // The related model (PokeCard)
            'poke_card_set_relations',     // The pivot table
            'set_id',                      // Foreign key on the pivot table pointing to PokeSet
            'related_card_id',             // Foreign key on the pivot table pointing to the related PokeCard
            'set_id',                      // Local key on the PokeSet model
            'card_id'                      // Local key on the related PokeCard model
        )
            ->using(PokeCardSetRelation::class)   // Use the custom pivot model
            ->withPivot('related_cards', 'related_sets')  // Additional fields in the pivot table
            ->withTimestamps();  // Include timestamps from the pivot table
    }
}
