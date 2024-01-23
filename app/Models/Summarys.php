<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summarys extends Model
{
    use HasFactory;

    protected $fillable = [
        'debt_id ',
        'amount',
        'amount_d',
        'debt_rounds_id',
    ];

}
