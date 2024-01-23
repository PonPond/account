<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
class PaymentController extends Controller
{
    public function store(Request $request)
    {
      
        $tableName = new Payments();
        $tableName->debt_id = $request->debt_id;
        $tableName->amount = $request->amount;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
