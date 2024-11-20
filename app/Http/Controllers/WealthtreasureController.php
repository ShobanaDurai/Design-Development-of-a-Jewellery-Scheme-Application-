<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WealthTreasureRegistration;
use App\Models\GoldSavingsRegistration;
use App\Models\WealthTransaction;
use Illuminate\Support\Facades\Auth;

class WealthtreasureController extends Controller
{
    public function wealthreg()
    {
        $userId = Auth::id();
        $existingRegistration = WealthTreasureRegistration::where('user_id', $userId)->first();

        if ($existingRegistration) {
            return redirect()->route('user-scheme');
        }
        return view('wealth-reg');
    }

    public function index()
    {
        $userId = Auth::id();
        $wealthTreasure = WealthTreasureRegistration::where('user_id', $userId)->get();
        $goldSavings = GoldSavingsRegistration::where('user_id', $userId)->get();

        // Add 'installments_paid' and 'status' attributes dynamically
        foreach ($wealthTreasure as $scheme) {
            $scheme->installments_paid = $scheme->transactions->count();

            // Determine if scheme is active or inactive
            $maturityDate = \Carbon\Carbon::parse($scheme->created_at)->addMonths($scheme->timeperiod);
            $scheme->status = now()->greaterThanOrEqualTo($maturityDate) ? 'Inactive' : 'Active';
        }
        return view('user-scheme', compact('wealthTreasure', 'goldSavings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
            'country' => 'required',
            'nominee' => 'required',
            'timeperiod' => 'required|integer|min:11|max:24',
            'installment' => 'required|numeric|min:1000',
            'aadhaar' => 'required',
            'terms' => 'accepted',
        ]);

        // $data['user_id'] = Auth::id();
        // WealthTreasureRegistration::create($data);

        // return redirect(route('user-scheme'))->with('success', 'Registration successful!');
        $otp = $this->generateOtp();
        $data['otp'] = $otp;

        $data['user_id'] = Auth::id();

        $newdata = WealthTreasureRegistration::create($data);

        return redirect()->route('wealth-otp');
    }

    protected function generateOtp()
    {
        $otp = rand(1000, 9999);
        return str_pad($otp, 4, '0', STR_PAD_LEFT);
    }

    public function show($id)
    {
        $wealthTreasure = WealthTreasureRegistration::where('user_id', $id)->first();
        return view('user-scheme', compact('wealthTreasure'));
    }

    public function showTransactionsPage()
    {
        $userId = Auth::id();
        $registration = WealthTreasureRegistration::where('user_id', $userId)->first();

        if ($registration) {
            $timePeriod = $registration->timeperiod;
            $startDate = $registration->created_at;
            $monthlyInstallment = $registration->installment;

            // Fetch all wealth transactions for this user
            $weltransactions = WealthTransaction::where('user_id', $userId)->get();

            return view('wealth-scheme-details', [
                'timePeriod' => $timePeriod,
                'startDate' => $startDate->format('Y-m-d'),
                'monthlyInstallment' => $monthlyInstallment, // Pass the installment value to the view
                'weltransactions' => $weltransactions // Pass the transactions to the view
            ]);
        } else {
            return redirect()->route('dashboard')->with('error', 'No registration found');
        }
    }

    public function storeTransaction(Request $request)
    {
        $data = $request->validate([
            'transaction_id' => 'required|string',
            'amount' => 'required|numeric',
            'weight' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        $data['user_id'] = Auth::id();
        WealthTransaction::create($data);

        $userId = Auth::id();
        $totalSavedWeightWel = WealthTransaction::where('user_id', $userId)->sum('weight');



        return response()->json(['success' => true, 'message' => 'Transaction stored successfully!','totalSavedWeightWel' => $totalSavedWeightWel]);
    }

    public function showSavedWeightWel()
    {
        $userId = Auth::id(); // Get the logged-in user ID
        $totalSavedWeightWel = WealthTransaction::where('user_id', $userId)->sum('weight'); // Calculate total weight

        return response()->json(['totalSavedWeightWel' => $totalSavedWeightWel]);
    }


}

