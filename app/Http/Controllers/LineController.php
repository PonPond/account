<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phattarachai\LineNotify\Facade\Line;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LineController extends Controller
{
    public function index(Request $request)
    {
        $orders = DB::table('orders')
        ->join('debtors', 'orders.debt_id', '=', 'debtors.id')
        ->select('orders.*', 'debtors.*')
        ->whereDate('end_date', '>', Carbon::now()) 
        ->orderBy('end_date', 'asc') 
        ->take(10)
        ->get();

        return view('page.lineNotify.index', compact('orders'));
    }



    public function notify()
    {

        $monthThai = [
            1 => "มกราคม",
            2 => "กุมภาพันธ์",
            3 => "มีนาคม",
            4 => "เมษายน",
            5 => "พฤษภาคม",
            6 => "มิถุนายน",
            7 => "กรกฎาคม",
            8 => "สิงหาคม",
            9 => "กันยายน",
            10 => "ตุลาคม",
            11 => "พฤศจิกายน",
            12 => "ธันวาคม"
        ];
        
        $month = $monthThai[Carbon::now()->month];
        
        $orders = DB::table('orders')
            ->join('debtors', 'orders.debt_id', '=', 'debtors.id')
            ->select('orders.*', 'debtors.*')
            ->whereYear('end_date', '=', Carbon::now()->year)
            ->whereMonth('end_date', '=', Carbon::now()->month)
            ->orderBy('end_date', 'asc') 
            ->take(10)
            ->get();
        
            foreach ($orders as $item){
                Line::send("รายการครบชำระเดือน $month\nชื่อ: {$item->debtors_name}\nเลขบัตร: {$item->debtors_id}\nวันที่ครบกำหนด: {$item->end_date}");
            }
        
        return redirect()->route('line.index')->with('success', "ส่งข้อความแจ้งเตือนเรียบร้อย");
    }

    
}
