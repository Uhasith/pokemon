<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeCardPriceTimeSeries extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_price_time_series';

    protected $casts = [
        'timeseries_data' => 'array',
    ];
}
