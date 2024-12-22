<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class RecordKeepingController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('record-keeping', compact('customers'));
    }
}
