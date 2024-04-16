<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dd_payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'debt_id ',
        'amount',
        'debt_rounds_id',
    ];
}
