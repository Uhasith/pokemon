<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function cards(): HasMany
    {
        return $this->hasMany(PokeCard::class, 'set_id', 'set_id');
    }
}
