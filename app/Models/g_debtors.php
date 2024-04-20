<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class g_debtors extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_name',
        'g_address',
        'g_id',
        'g_phone',
        'g_id_image',
        'debt_id',
    ];
}
