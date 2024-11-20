<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     $user = Auth::user();

    //     // Check if the user is registered for any scheme
    //     $schemeRegistered = $user->goldSavingsRegistration()->exists() || $user->wealthTreasureregistration()->exists();

    //     if($user->user_type == 'customer'){
    //         if ($schemeRegistered) {
    //             return redirect()->route('user-scheme');
    //         }

    //         return redirect()->route('home');
    //     }
    //     elseif($user->user_type == 'admin'){
    //         return redirect()->route('admin_dashboard');
    //     }
    //     else{
    //         return abort(403, 'Unauthorized action.');
    //     }


    // }


    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Check if the user is registered for gold and/or wealth schemes
        $goldRegistration = $user->goldSavingsRegistration()->where('user_id', $user->id)->first();
        $wealthRegistration = $user->wealthTreasureregistration()->where('user_id', $user->id)->first();

        if ($user->user_type == 'customer') {
            // If user is registered for both schemes
            if ($goldRegistration && $wealthRegistration) {
                // If neither OTP is verified, start with gold-otp
                if (!$goldRegistration->otp_verified_at && !$wealthRegistration->otp_verified_at) {
                    return redirect()->route('gold-otp', ['user_id' => $user->id]);
                }
                // If gold-otp is verified but wealth-otp is not, redirect to wealth-otp
                if ($goldRegistration->otp_verified_at && !$wealthRegistration->otp_verified_at) {
                    return redirect()->route('wealth-otp', ['user_id' => $user->id]);
                }
            }

            // Check if only the gold scheme is registered and otp_verified_at is null
            if ($goldRegistration && !$goldRegistration->otp_verified_at) {
                return redirect()->route('gold-otp', ['user_id' => $user->id]);
            }

            // Check if only the wealth scheme is registered and otp_verified_at is null
            if ($wealthRegistration && !$wealthRegistration->otp_verified_at) {
                return redirect()->route('wealth-otp', ['user_id' => $user->id]);
            }

            // If both OTPs are verified or at least one scheme is registered, move to user-scheme
            if (($goldRegistration && $goldRegistration->otp_verified_at) &&
                ($wealthRegistration && $wealthRegistration->otp_verified_at)) {
                return redirect()->route('user-scheme');
            }

            // If no scheme is registered or OTPs are not verified, redirect to home page
            return redirect()->route('home');
        }
        elseif ($user->user_type == 'admin') {
            return redirect()->route('admin_dashboard');
        }
        else {
            return abort(403, 'Unauthorized action.');
        }
    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
