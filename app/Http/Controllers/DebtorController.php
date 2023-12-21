<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebtorController extends Controller
{
    public function index()
    {
        return view('page.debtor.index');
    }
}
