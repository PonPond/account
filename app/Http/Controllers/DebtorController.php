<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtor;
use App\Models\g_debtors;
class DebtorController extends Controller
{
    public function index()
    {
        $debtor = Debtor::all();
        $debtorg = g_debtors::all();
        
        return view('page.debtor.index',compact('debtor','debtorg'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'debtors_name' => 'required',
            'debtors_address' => 'required',
            'debtors_phone' => 'required',
            'debtors_id_image' => 'required',
            'type' => 'required',
            'per' => 'required',
        ],
            [
                'debtors_name.required' => "ชื่อ-นามสกุล ลูกหนี้",
                'debtors_address.required' => "ที่อยู่ ลูกหนี้",
                'debtors_phone.required' => "เบอร์โทร ลูกหนี้",
                'debtors_id_image.required' => "ลิงค์รูปบัตรประชาชน ลูกหนี้",
                'type.required' => "ประเภทลูกหนี้",
                'per.required' => "เปอร์เซ็น",
            ],

        );

        $tableName = new Debtor();
        $tableName->debtors_name = $request->debtors_name;
        $tableName->debtors_address = $request->debtors_address;
        $tableName->debtors_phone = $request->debtors_phone;
        $tableName->debtors_id_image = $request->debtors_id_image;
        $tableName->type = $request->type;
        $tableName->per = $request->per;
        $tableName->save();

        return redirect()->route('debtor.index')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function storeg(Request $request)
    {
        $tableName = new g_debtors();
        $tableName->g_name = $request->g_name;
        $tableName->g_address = $request->g_address;
        $tableName->g_phone = $request->g_phone;
        $tableName->g_id_image = $request->g_id_image;
        $tableName->debt_id  = $request->debt_id ;
    
        $tableName->save();

        return redirect()->route('debtor.index')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function delete($g_id)
    {
        //ลบข้อมูล
        $delete = g_debtors::find($g_id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }

    public function deleteb($id)
    {
        //ลบข้อมูล
        $delete = Debtor::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }
}
