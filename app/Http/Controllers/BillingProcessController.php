<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class BillingProcessController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $pendingPayments = Payment::where('status', 'pending')->sum('amount');
        $completedPayments = Payment::where('status', 'completed')->sum('amount');

        return view('billing-process', [
            'payments' => $payments,
            'pendingPayments' => $pendingPayments,
            'completedPayments' => $completedPayments
        ]);
    }
}
