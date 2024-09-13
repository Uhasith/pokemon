<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'sale_date' => 'date',
    ];

    public function getSaleDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
