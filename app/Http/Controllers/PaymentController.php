<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\dd_payment;
use App\Models\Summarys;
use App\Models\Orders;
use App\Models\Transition;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
      
        $tableName = new Payments();
        $tableName->debt_id = $request->debt_id;
        $tableName->amount = $request->amount;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->save();


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
   

        $tableName1 = new Summarys();
        $tableName1->debt_id = $request->debt_id;
        $tableName1->debt_rounds_id = $request->debt_rounds_id;
        $tableName1->amount = $totalAmount1;
        $tableName1->amount_d = $request->amount_d;
       
        $tableName1->save();

        
        $tableName3 = new Transition();
        $tableName3->debt_id = $request->debt_id;
        $tableName3->debt_rounds_id = $request->debt_rounds_id;
        $tableName3->count_date_stuck = $request->count_date_stuck;
        $tableName3->money_index = $request->money_index;
        $tableName3->interest_month = $request->interest_month;
        $tableName3->interest_date = $request->interest_date;
        $tableName3->interest_total = $request->interest_total;
        $tableName3->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function storedd(Request $request)
    {
      
        $tableName = new dd_payment();
        $tableName->debt_id = $request->debt_id;
        $tableName->amount = $request->amount;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->save();

        return redirect()->back()->with('payment', "บันทึกข้อมูลเรียบร้อย");

    }
}
