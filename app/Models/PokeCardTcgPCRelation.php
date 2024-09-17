<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PokeCardTcgPCRelation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'poke_card_tcg_pc_relations';

    public function all_card(): HasOne
    {
        return $this->hasOne(PokeAllCard::class, 'card_id', 'card_id');
    }

}
