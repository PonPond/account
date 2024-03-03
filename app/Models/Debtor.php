<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtors_name',
        'debtors_address',
        'debtors_phone',
        'debtors_id_image',
        'type',
        'per',
        'total_debts',
    ];
}


// 'g_name',
// 'g_address',
// 'g_phone',
// 'g_id_image',
