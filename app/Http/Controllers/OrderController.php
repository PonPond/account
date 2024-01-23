<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Debtor;
use App\Models\debt_rounds;
class OrderController extends Controller
{
    public function store(Request $request)
    {
      
        $tableName = new Orders();
        $tableName->debt_id = $request->debt_id;
        $tableName->end_date = $request->end_date;
        $tableName->total_price = $request->total_price;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->save();


        $deb = Debtor::find($request->debt_id);
        if($deb != null){
             $debtotal = $deb->total_debts;
             Debtor::find($request->debt_id)->
             update([
                 'total_debts' =>$debtotal + $request->total_price,
             ]);
         }

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function storeround(Request $request)
    {
      
        $tableName = new debt_rounds();
        $tableName->debt_id = $request->debt_id;
        $tableName->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
