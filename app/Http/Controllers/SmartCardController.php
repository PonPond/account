<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmartcardController extends Controller
{
    public function showNewPage()
    {
        return view('page.smartCard.res');
    }

    public function fetchData()
    {
        $response = Http::get('http://localhost:8080/read-smartcard');

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['response' => 'รีเพรชหน้าเพื่อดึงข้อมูล'], 500);
    }

    public function getSmartcard()
    {
        $response = file_get_contents('https://larave.devhubbravo.com/get-smartcard');

        return response()->json($response);
    }
}
