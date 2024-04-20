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
        'debtors_id',
        'debtors_phone',
        'debtors_id_image',
        'type',
        'per',
        'total_debts',
    ];

    public function debg()
    {
    return $this->hasMany(g_debtors::class, 'debt_id', 'id');
    }
}



