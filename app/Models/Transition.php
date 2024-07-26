<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'debt_id',
        'debt_rounds_id',
        'count_date_stuck',
        'money_index',
        'interest_month',
        'interest_date',
        'interest_total',
    ];
}