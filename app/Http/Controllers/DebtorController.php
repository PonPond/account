<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtor;
use App\Models\g_debtors;
use DataTables;

class DebtorController extends Controller
{

    public function index(Request $request)
    {
        $data = Debtor::latest()->get();
        $debtorg = g_debtors::all();


        if ($request->ajax()) {
            $data = Debtor::latest()->get();
            return DataTables()->of($data)
                ->addColumn('g_user_id', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->id;
                        }
                    }
                    return $debtors;
                })
               
                ->addColumn('g_id', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->g_id;
                        }
                    }
                    return $debtors;
                })
                
                ->addColumn('g_name', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->g_name;
                        }
                    }
                    return $debtors;
                })
                ->addColumn('g_address', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->g_address;
                        }
                    }
                    return $debtors;
                })
                ->addColumn('g_phone', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->g_phone;
                        }
                    }
                    return $debtors;
                })
                ->addColumn('g_id_image', function ($row) use ($debtorg) {
                    $debtors = '';
                    foreach ($debtorg as $debt) {
                        if ($debt->debt_id == $row->id) {
                            $debtors .= $debt->g_id_image;
                        }
                    }
                    return $debtors;
                })
                ->rawColumns(['g_user_id','g_name','g_id','g_address','g_phone','g_id_image'])
                ->make(true);
        }
        return view('page.debtor.index', ['debtor' => $data]);
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'debtors_name' => 'required',
                'debtors_address' => 'required',
                'debtors_id' => 'required',
                'debtors_phone' => 'required',
                'debtors_id_image' => 'required',
                'type' => 'required',
                'per' => 'required',
            ],
            [
                'debtors_name.required' => "ชื่อ-นามสกุล ลูกหนี้",
                'debtors_address.required' => "ที่อยู่ ลูกหนี้",
                'debtors_id.required' => "รหัสบัตรประชาชน",
                'debtors_phone.required' => "เบอร์โทร ลูกหนี้",
                'debtors_id_image.required' => "ลิงค์รูปบัตรประชาชน ลูกหนี้",
                'type.required' => "ประเภทลูกหนี้",
                'per.required' => "เปอร์เซ็น",
            ],

        );

        $tableName = new Debtor();
        $tableName->debtors_name = $request->debtors_name;
        $tableName->debtors_address = $request->debtors_address;
        $tableName->debtors_id = $request->debtors_id;
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
        $tableName->g_id = $request->g_id;
        $tableName->g_phone = $request->g_phone;
        $tableName->g_id_image = $request->g_id_image;
        $tableName->debt_id  = $request->debt_id;

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


    public function update(Request $request, $id)
    {


        $request->validate(
            [
                'debtors_name' => 'required',
                'debtors_address' => 'required',
                'debtors_phone' => 'required',
                'debtors_id_image' => 'required',
                'per' => 'required',


            ],

            [
                'debtors_name.required' => "ห้ามเป็นค่าว่าง",
                'debtors_address.required' => "ห้ามเป็นค่าว่าง",
                'debtors_phone.required' => "ห้ามเป็นค่าว่าง",
                'debtors_id_image.required' => "ห้ามเป็นค่าว่าง",
                'per.required' => "ห้ามเป็นค่าว่าง",
            ]
        );

        Debtor::find($id)->update([
            'debtors_name' => $request->debtors_name,
            'debtors_address' => $request->debtors_address,
            'debtors_phone' => $request->debtors_phone,
            'debtors_id_image' => $request->debtors_id_image,
            'per' => $request->per,

        ]);


        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }
}
