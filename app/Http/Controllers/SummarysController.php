<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summarys;
use App\Models\Orders;
use App\Models\Payments;
class SummarysController extends Controller
{
    public function store(Request $request)
    {
        
        
        $deb1 = Orders::where('debt_id', $request->debt_id)
        ->where('debt_rounds_id', '=', $request->debt_rounds_id)
        ->first();

        $deb2 = Payments::where('debt_id', $request->debt_id)
        ->where('debt_rounds_id', '=', $request->debt_rounds_id)
        ->get();

    
      
        $totalAmount1 = $deb2->sum('amount');
        $totalAmount2 = $deb1->total_price ?? 0;
        $totalAmount3 = $totalAmount2 - $totalAmount1;
       

       
        Orders::where('debt_id', $request->debt_id)
        ->where('debt_rounds_id', '=', $request->debt_rounds_id)
        ->update([
            'amount' => $totalAmount3,
        ]);
   

        $tableName = new Summarys();
        $tableName->debt_id = $request->debt_id;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->amount = $totalAmount1;
        $tableName->amount_d = $request->amount_d;
        $tableName->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
