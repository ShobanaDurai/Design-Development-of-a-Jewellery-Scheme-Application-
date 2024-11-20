<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoldTransaction;
use Illuminate\Support\Facades\Auth;

class GoldPaymentHistoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = GoldTransaction::where('user_id', $userId);

       // Implement search functionality
    if ($request->has('search')) {
        $search = $request->input('search');

        $query->where(function ($query) use ($search) {
            // Exact match for amount
            $query->where('amount', $search)
                // Exact match for weight
                ->orWhere('weight', $search)
                // Partial match for date
                ->orWhere('date', 'like', "%$search%");
        });
    }



        $goldtransactions = $query->get();

        // Fetch data for the graph
        $graphData = GoldTransaction::select('date', 'amount')
                                    ->where('user_id', $userId)
                                    ->get();

        return view('gold-history', compact('goldtransactions', 'graphData'));
    }
}
