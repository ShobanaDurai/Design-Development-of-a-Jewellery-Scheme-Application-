<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoldTransaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class GoldtransactionController extends Controller
{
    public function index(){
        $transactions = GoldTransaction::where('user_id', Auth::id())->get();
        return view('gold-scheme-details', compact('transactions'));

        $goldtransactions = GoldTransaction::with('goldSavingsRegistration')->get();
        return view('gold-history', compact('goldtransactions'));

    }

    public function store(Request $request)
    {
        $transaction = new GoldTransaction();
        $transaction->user_id = Auth::id();
        $transaction->transaction_id = $request->transaction_id;
        $transaction->amount = $request->amount;
        $transaction->weight = $request->weight;
        $transaction->date = $request->date;
        $transaction->time = $request->time;
        $transaction->save();

        $totalSavedWeight = GoldTransaction::where('user_id', $userId)->sum('weight');

        return response()->json(['success' => 'Transaction added successfully']);
    }

    public function showSavedWeight()
    {
        $userId = Auth::id(); // Get the logged-in user ID
        $totalSavedWeight = GoldTransaction::where('user_id', $userId)->sum('weight'); // Calculate total weight

        return response()->json(['totalSavedWeight' => $totalSavedWeight]);
    }



}







