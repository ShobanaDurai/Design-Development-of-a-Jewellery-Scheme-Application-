<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoldSavingsRegistration;
use App\Models\WealthTreasureRegistration;
use Illuminate\Support\Facades\Auth;

class GoldsavingsController extends Controller
{
    public function goldreg(){
        $userId = Auth::id();
        $existingRegistration = GoldSavingsRegistration::where('user_id', $userId)->first();

        if ($existingRegistration) {
            return redirect()->route('user-scheme');
        }

        return view('gold-reg');

    }
    public function index()
    {

        $userId = Auth::id();
        $goldSavings = GoldSavingsRegistration::where('user_id', Auth::id())->get();
        $wealthTreasure = WealthTreasureRegistration::where('user_id',  Auth::id())->get();

        foreach ($goldSavings as $scheme) {


            // Determine if scheme is active or inactive
            $maturityDate = \Carbon\Carbon::parse($scheme->created_at)->addMonths($scheme->timeperiod);
            $scheme->status = now()->greaterThanOrEqualTo($maturityDate) ? 'Inactive' : 'Active';
        }
        return view('user-scheme', compact('goldSavings','wealthTreasure'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'nullable|email',
            'address' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
            'country' => 'required',
            'nominee' => 'required',
            'aadhaar' => 'required',
        ]);

        $otp = $this->generateOtp();
        $data['otp'] = $otp;

        $data['user_id'] = Auth::id();

        $newdata = GoldSavingsRegistration::create($data);

        return redirect()->route('gold-otp');
    }

    protected function generateOtp()
    {
        $otp = rand(1000, 9999);
        return str_pad($otp, 4, '0', STR_PAD_LEFT);
    }

    public function show($id)
    {
        $goldSavings = GoldSavingsRegistration::where('user_id', $id)->first();
        return view('user-scheme', compact('goldSavings'));
    }


}
