<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtor;
use App\Models\g_debtors;
use DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DebtorSearchController extends Controller
{
    

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // ดึงข้อมูลจากตาราง debtors และเรียงลำดับตาม created_at จากมากไปน้อย
            $data = DB::table('debtors')
                ->select('debtors.*')
                ->orderByDesc('debtors.created_at');
            // ดึงข้อมูลจากตาราง g_debtors และเรียงลำดับตาม created_at จากมากไปน้อย

            return DataTables::of($data)


                ->make(true);
        }

        return view('page.debtorSearch.index');
    }

   
}
