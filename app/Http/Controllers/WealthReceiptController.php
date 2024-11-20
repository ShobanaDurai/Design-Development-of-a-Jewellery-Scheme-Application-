<?php

namespace App\Http\Controllers;
use App\Models\WealthTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WealthReceiptController extends Controller
{
    public function show($transaction_id)
    {
        $transaction = WealthTransaction::where('transaction_id', $transaction_id)->firstOrFail();
        return view('wealthreceipt', ['transaction' => $transaction]);
    }

    public function showAllTransactions()
    {
        $userId = auth()->id();

        $totalAmount = WealthTransaction::where('user_id', $userId)->sum('amount');
        $totalWeight = WealthTransaction::where('user_id', $userId)->sum('weight');
        // Fetch all transactions
        $transactions = WealthTransaction::where('user_id', $userId)->get();

        // Render view
        return view('overallwealthreceipt', compact('totalAmount', 'totalWeight', 'transactions'));
    }
    
}
