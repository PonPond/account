<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $fillable = [
        'debt_id',
        'end_date',
        'total_price',
        'amount',
        'debt_rounds_id',
        'created_at',
       
    ];
  
    use HasFactory;

   
}
