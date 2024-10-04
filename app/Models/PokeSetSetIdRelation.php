<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PokeSetSetIdRelation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_set_set_id_relations';

    public function all_set(): HasOne
    {
        return $this->hasOne(PokeAllSet::class, 'set_id', 'set_id');
    }
}
