<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\GoldSavingsRegistration;
use App\Models\WealthTreasureRegistration;

class OtpController extends Controller
{
    public function goldotp()
    {
        $user = Auth::user();
        return view('otp', compact('user'));
    }

    public function validateOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required',
        ]);

        $userId = $request->input('user_id');
        $inputOtp = $request->input('otp');

        if (is_array($inputOtp)) {
            $inputOtp = implode('', $inputOtp);
        }

        $user = GoldSavingsRegistration::where('user_id', $userId)->first();

        if ($user) {
            if (trim($user->otp) === trim($inputOtp)) {
                $user = GoldSavingsRegistration::where('id', $user->id)->first();
                $user->otp_verified_at = now();
                $user->save();

                $wealthUser = WealthTreasureRegistration::where('user_id', $userId)->first();
                if ($wealthUser && is_null($wealthUser->otp_verified_at)) {
                    return redirect()->route('wealth-otp', ['user_id' => $userId])
                        ->with('success', 'OTP verified for gold savings, please verify for wealth treasure.');
                }

                return redirect()->route('user-scheme')->with('success', 'OTP verified successfully.');
            } else {
                return back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
            }
        } else {
            return back()->withErrors(['otp' => 'User not found'])->withInput();
        }
    }


    public function resendOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:goldsavingsregistration,user_id',
        ]);

        $userId = $request->input('user_id');

        $user = GoldSavingsRegistration::where('user_id', $userId)->first();

        $newOtp = rand(1000, 9999);

        if ($user) {
            $user->update(['otp' => $newOtp]);
            return response()->json(['success' => true, 'message' => 'OTP has been resent successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found!'], 404);
        }
    }

    public function wealthotp()
    {
        $user = Auth::user();
        return view('wealth-otp', compact('user'));
    }

    public function validatewealthOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required',
        ]);

        $userId = $request->input('user_id');
        $inputOtp = $request->input('otp');

        if (is_array($inputOtp)) {
            $inputOtp = implode('', $inputOtp);
        }

        $user = WealthTreasureRegistration::where('user_id', $userId)->first();

        if ($user) {
            if (trim($user->otp) === trim($inputOtp)) {
                $user = WealthTreasureRegistration::where('id', $user->id)->first();
                $user->otp_verified_at = now();
                $user->save();


                $goldUser = GoldSavingsRegistration::where('user_id', $userId)->first();
                if ($goldUser && is_null($goldUser->otp_verified_at)) {

                    return redirect()->route('gold-otp', ['user_id' => $userId])
                        ->with('success', 'OTP verified for wealth treasure, please verify for gold savings.');
                }

                return redirect()->route('user-scheme')->with('success', 'OTP verified successfully.');
            } else {
                return back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
            }
        } else {
            return back()->withErrors(['otp' => 'User not found'])->withInput();
        }
    }

    public function resendwealthOtp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:wealthtreasureregistration,user_id',
        ]);

        $userId = $request->input('user_id');

        $user = WealthTreasureRegistration ::where('user_id', $userId)->first();

        $newOtp = rand(1000, 9999);

        if ($user) {
            $user->update(['otp' => $newOtp]);
            return response()->json(['success' => true, 'message' => 'OTP has been resent successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found!'], 404);
        }
    }

    public function getUserRedirectRoute()
    {
        $user = Auth::user();
        $goldRegistration = GoldSavingsRegistration::where('user_id', $user->id)->first();
        $wealthRegistration = WealthTreasureRegistration::where('user_id', $user->id)->first();

        if ($goldRegistration && $goldRegistration->otp_verified_at === null) {
            return route('gold-otp', ['user_id' => $user->id]);
        }

        if ($wealthRegistration && $wealthRegistration->otp_verified_at === null) {
            return route('wealth-otp', ['user_id' => $user->id]);
        }

        if (($goldRegistration && $goldRegistration->otp_verified_at !== null) &&
            ($wealthRegistration && $wealthRegistration->otp_verified_at !== null)) {
            return route('user-scheme');
        }
        return route('user-scheme');
    }

}











