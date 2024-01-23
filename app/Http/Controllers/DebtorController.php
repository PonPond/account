<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtor;
class DebtorController extends Controller
{
    public function index()
    {
        $debtor = Debtor::all();
        return view('page.debtor.index',compact('debtor'));
    }


    public function store(Request $request)
    {
        $tableName = new Debtor();
        $tableName->debtors_name = $request->debtors_name;
        $tableName->debtors_address = $request->debtors_address;
        $tableName->debtors_phone = $request->debtors_phone;
        $tableName->debtors_id_image = $request->debtors_id_image;
        $tableName->g_name = $request->g_name;
        $tableName->g_address = $request->g_address;
        $tableName->g_phone = $request->g_phone;
        $tableName->g_id_image = $request->g_id_image;
        $tableName->type = $request->type;
        $tableName->per = $request->per;
        $tableName->save();

        return redirect()->route('debtor.index')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
