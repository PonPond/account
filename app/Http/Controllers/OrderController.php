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
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->created_at = $request->created_date;
     
        
      
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
        $tableName->title = $request->title;
        $tableName->debt_id = $request->debt_id;
        $tableName->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function update(Request $request, $id)
    {
       
        $request->validate([
            'created_at' => 'required',
            'end_date' => 'required',
        ],

            ['created_at.required' => "ห้ามเป็นค่าว่าง",
            'end_date.required' => "ห้ามเป็นค่าว่าง",
       
            ]
        );  

        Orders::find($id)->update([
            'created_at' => $request->created_at,
            'end_date' => $request->end_date,
        ]);


    
        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }
}
