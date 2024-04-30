<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Debtor;
use App\Models\Payments;
use App\Models\Orders;
use App\Models\Summarys;
use App\Models\debt_rounds;
use App\Models\dd_payment;
use App\Models\remark;
use Carbon\Carbon;
use Phattarachai\LineNotify\Facade\Line;
use Illuminate\Support\Facades\DB;
class DebtorMController extends Controller
{

    public function indexD(Request $request)
    {
        $data = DB::table('debtors')
        ->select('debtors.*')
        ->where('type', 'รายวัน')
        ->orderByDesc('created_at');

        if ($request->ajax()) {
            return DataTables()->of($data)
               
                ->make(true);
        }
        return view('page.debtorD.index');
    }
    public function index(Request $request)
    {
        $data = DB::table('debtors')
        ->select('debtors.*')
        ->where('type', 'รายเดือน')
        ->orderByDesc('created_at');

        if ($request->ajax()) {
            return DataTables()->of($data)
               
                ->make(true);
        }
        return view('page.debtorM.index');
    }
    public function indexY(Request $request)
    {
        $data = DB::table('debtors')
        ->select('debtors.*')
        ->where('type', 'รายปี')
        ->orderByDesc('created_at');


        if ($request->ajax()) {
            return DataTables()->of($data)
               
                ->make(true);
        }
        return view('page.debtorY.index');
    }
    
    public function notify()
    {
        Line::send('ทดสอบ');
    }

    public function read($id)
    {
        $deb1 = Debtor::find($id);
        $deb2= Payments::where('debt_id',$id)->get();
        $deb3= Orders::where('debt_id',$id)->get();
        $deb4 = DB::table('debt_rounds')
        ->where('debt_id', $id)
        ->whereIn('status', ['active', 'complete'])
        ->get();
        
        return view('page.debtorM.find', compact('deb1','deb2','deb3','deb4'));
    }

    public function delete($id)
    {
        //ลบข้อมูล
        $delete = debt_rounds::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }

    public function update(Request $request, $id)
    {
        
        debt_rounds::find($id)->update([
            'status' => "inactive",
        ]);
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");
    }

    public function updatefinal(Request $request, $id)
    {
        
        debt_rounds::find($id)->update([
            'status' => "complete",
        ]);
        return redirect()->back()->with('complete', "ปิดบิลเรียบร้อย");
    }

    public function updatemoney(Request $request, $id)
    {
      
        
        debt_rounds::find($id)->update([
            'round_amount' => $request->round_amount,
            'round_interest' => $request->round_interest,
            
        ]);
        return redirect()->back()->with('update', "ปรับปรุงยอดเรียบร้อย");
    }



    public function readdeb($id)
    {
        
    
        $deb1 = Debtor::find($id);    
        $deb5 = debt_rounds::find($id);
        $deb3 = Orders::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->get();
       
        $deb8 = Orders::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->first();
        
        $remark = remark::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->get();
   

        $deb4= debt_rounds::where('debt_id',$id)->get();
        $deb6 = Debtor::where('id', $deb5->debt_id)->first();
       
        $deb2 = Payments::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->get();

        $totalsum = $deb2->sum('amount');

        $dd_payment = dd_payment::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->get();

        $totalsumdd = $dd_payment->sum('amount');
       

        $deb7 = Summarys::where('debt_id', $deb5->debt_id)
        ->where('debt_rounds_id', '=', $deb5->id)
        ->orderBy('created_at', 'desc') 
        ->get();
      
        $totalAmountD = $deb7->sum('amount_d');
        
        $totalAmountDCP = $deb7->sum('amount_d');


        $totalAmountD = intval($totalAmountD);
        $totalAmountD -=  intval($totalsumdd)   ;

        if (!empty($deb3[0])) {
            $result = $this->calculateRemainingPeriods($deb3[0]->end_date);
            $fullM = $result['fullM'];
            $fullD = $result['fullD'];
        } else {
            $result = null;
            $fullM = null;
            $fullD = null;
        }
      
       
      
        if (!empty($deb3[0])) {
            $per = $this->calculateInterestAndDays($deb5->debt_id, $deb3[0]->id);
            $day = $per['daysPassed'];
            $fullper = $per['interestInFullPeriods'];
            $rday = $per['interestInRemainingDays'];
            $totalint = $per['totalInterest'];
        } else {
            $per = null;  
            $day = null;
            $fullper = null;
            $rday = null;
            $totalint = null;
        }
      
        
        return view('page.debtorM.finddeb', compact('deb1','deb2','deb3','deb4','deb5','deb6','deb7','deb8','totalAmountD','fullM','fullD','per','day','fullper','rday','totalint','totalsum','remark','dd_payment','totalsumdd','totalAmountDCP'));
    }

    
    protected function calculateRemainingPeriods($endDateString, $daysInEachPeriod = 30)
    {
        try {
            $endDate = Carbon::parse($endDateString);
            $now = Carbon::now();
            $remainingDays = $now->diffInDays($endDate);
            // คำนวณจำนวนรอบที่เต็ม
            $fullM = intdiv($remainingDays, $daysInEachPeriod);
            // คำนวณวันที่เหลือหลังจากที่มีรอบเต็ม
            $fullD = $remainingDays % $daysInEachPeriod;
    
            // ตรวจสอบว่าวันที่ในอนาคตเป็นอดีตหรือไม่
            if ($endDate->isPast()) {
                $fullM *= -1;
                $fullD *= -1;
            }
    
            return ['fullM' => $fullM, 'fullD' => $fullD];
        } catch (\Exception $e) {
            // จัดการกับข้อผิดพลาด, เช่น ล็อก, ส่งอีเมล์, หรือคืนค่าที่เหมาะสม
            return null;
        }
    }


    protected function calculateInterestAndDays($debtorId, $orderId)
    {

    $findDeb = Debtor::find($debtorId);
    $order = Orders::find($orderId);

    
    if (!$findDeb || !$order) {
        return null;
    }

    if($order->amount == 0){
       
        $startDate = Carbon::parse($order->created_at);
    }else{
      
        $summary = Summarys::where('debt_id', $findDeb->id)
        ->where('debt_rounds_id', '=', $order->debt_rounds_id)
        ->orderBy('created_at', 'desc') 
        ->first();
       
        $startDate = Carbon::parse($summary->created_at);
    }



    $now = Carbon::now();
    $daysPassed = $now->diffInDays($startDate);

    $summary = Summarys::where('debt_id', $findDeb->id)
    ->where('debt_rounds_id', '=', $order->debt_rounds_id)
    ->orderBy('created_at', 'desc') 
    ->first();

    if($summary !== null){
 
        $principalAmount =$order->amount;
    }else{
        $principalAmount = $order->total_price;
    }

   

    $interestRate = $findDeb->per;
    $numberOfFullPeriods = floor($daysPassed / 30);
    $remainingDays = $daysPassed % 30;
    
    $interestInFullPeriods = $principalAmount * ($interestRate / 100) * $numberOfFullPeriods;
    $interestInRemainingDays = $principalAmount * ($interestRate / 100) * ($remainingDays / 30);
  
    $totalInterest = $interestInFullPeriods + $interestInRemainingDays;

    return [
        'daysPassed' => $daysPassed,
        'interestInFullPeriods' => $interestInFullPeriods,
        'interestInRemainingDays' => $interestInRemainingDays,
        'totalInterest' => $totalInterest,
    ];
}




    
}
