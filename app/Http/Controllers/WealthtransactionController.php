<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WealthTransaction;
use App\Models\WealthTreasureRegistration;
use Illuminate\Support\Facades\Auth;

class WealthtransactionController extends Controller
{

    public function index()
    {
        // Fetch wealth transactions with related registration data
        $wealthtransactions = WealthTransaction::with('registration')->get();
        return view('wealth-history', compact('wealthtransactions'));
    }
    
    
}
