<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PokeSet extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = ['id'];

    protected $table = 'poke_sets';

    protected $casts = [
        'release_date' => 'date',
        'last_pop_updated' => 'date',
        'is_promo' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('set_name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnCreate()
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function all_set(): HasOne
    // {
    //     return $this->hasOne(PokeSet::class, 'set_id', 'set_id');
    // }

    public function all_set(): HasOneThrough
    {
        return $this->hasOneThrough(
            PokeAllSet::class, // Final model to retrieve (PokeAllSet)
            PokeSetSetIdRelation::class, // Intermediate model (PokeSetSetIdRelation)
            'set_id', // Foreign key on PokeSetSetIdRelation (linking to PokeSet)
            'set_id', // Foreign key on PokeAllSet (linking to PokeSetSetIdRelation)
            'set_id', // Local key on PokeSet (linking to PokeSetSetIdRelation)
            'related_set_id'  // Local key on PokeSetSetIdRelation (linking to PokeAllSet)
        );
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
