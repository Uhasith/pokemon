<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'date_checked' => 'date',
    ];
}
