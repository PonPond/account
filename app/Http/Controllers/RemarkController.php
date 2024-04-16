<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\remark;

class RemarkController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ],
            [
                'title.required' => "รายการต้องไม่เป็นค่าว่าง",
                'price.required' => "ราคาต้องไม่เป็นค่าว่าง",
                
            ],

        );

        $tableName = new remark();
        $tableName->debt_id = $request->debt_id;
        $tableName->debt_rounds_id = $request->debt_rounds_id;
        $tableName->title = $request->title;
        $tableName->price = $request->price;
        $tableName->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }


    public function delete($id)
    {
    
        $delete = remark::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }
}
