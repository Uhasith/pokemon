<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeCardTransactionTimeSeries extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'poke_card_transaction_time_series';

    protected $casts = [
        'timeseries_data' => 'array',
    ];
}
