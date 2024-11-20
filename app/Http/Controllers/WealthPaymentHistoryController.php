<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WealthTransaction;
use Illuminate\Support\Facades\Auth;


class WealthPaymentHistoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = WealthTransaction::where('user_id', $userId);

        // Implement search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('amount', 'like', "%$search%")
                      ->orWhere('date', 'like', "%$search%");
            });
        }

       
        $wealthtransactions = $query->get();

        $graphData = WealthTransaction::select('date', 'amount')
                                    ->where('user_id', $userId)
                                    ->get();
        
        return view('wealth-history', compact('wealthtransactions','graphData'));
    }
}
