<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debt_rounds extends Model
{
    use HasFactory;

    protected $fillable = [
        'debt_id',
        'title',
        'round_amount',
        'round_interest',
        'status',
    ];
}
