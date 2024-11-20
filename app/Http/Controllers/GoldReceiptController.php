<?php

namespace App\Http\Controllers;
use App\Models\GoldTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoldReceiptController extends Controller
{
    public function show($transaction_id)
    {
        $transaction = GoldTransaction::where('transaction_id', $transaction_id)->firstOrFail();
        return view('goldreceipt', compact('transaction'));
    }

   

    public function showAllTransactions()
    {
        // Get the currently authenticated user ID
        $userId = Auth::id();

        // Fetch sum of amount and weight
        $totalAmount = GoldTransaction::where('user_id', $userId)->sum('amount');
        $totalWeight = GoldTransaction::where('user_id', $userId)->sum('weight');

        // Fetch all transactions
        $transactions = GoldTransaction::where('user_id', $userId)->get();

        // Pass the data to the view
        return view('overallgoldreceipt', compact('totalAmount', 'totalWeight', 'transactions'));
    }
}


