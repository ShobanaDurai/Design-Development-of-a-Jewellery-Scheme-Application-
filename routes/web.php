<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SchemeFormController;
use App\Http\Controllers\GoldPaymentHistoryController;
use App\Http\Controllers\GoldsavingsController;
use App\Http\Controllers\WealthtreasureController;
use App\Http\Controllers\GoldtransactionController;
use App\Http\Controllers\WealthtransactionController;
use App\Http\Controllers\WealthPaymentHistoryController;
use App\Http\Controllers\WealthReceiptController;
use App\Http\Controllers\GoldReceiptController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OtpController;




require __DIR__.'/admin.php';

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/about', [SchemeController::class, 'about'])->name('about');
Route::get('/faq', [SchemeController::class, 'faq'])->name('faq');
Route::get('/contact-us', [SchemeController::class, 'contact'])->name('contact');
Route::get('/', [SchemeController::class, 'feedback'])->name('home');




//schemes
Route::controller(SchemeController::class)->group(function () {
    Route::get('/gold-savings', 'showGoldSavings')->name('gold-savings');
    Route::get('/wealth-treasure', 'showWealthTreasure')->name('wealth-treasure');
});

//goldscheme registration

Route::middleware(['auth'])->group(function () {
    Route::controller(GoldsavingsController::class)->group(function () {
        Route::get('/gold-reg', 'goldreg')->name('gold-reg');
        Route::post('/gold-reg/form', 'store')->name('gold-reg.store');
        Route::get('/user-scheme', 'index')->name('user-scheme');
        Route::get('/gold-reg/{id}', 'show')->name('gold-reg-id');
    });
});


//wealthscheme registration
 Route::middleware(['auth'])->group(function () {
    Route::get('/wealth-reg', [WealthtreasureController::class, 'wealthreg'])->name('wealth-reg');
    Route::post('/wealth-reg/form',[WealthtreasureController::class, 'store'])->name('wealth-reg.store');
    Route::get('/user-scheme-wealth', [WealthtreasureController::class, 'index'])->name('user-scheme-wealth');
    Route::get('/wealth-reg/{id}', [WealthtreasureController::class, 'show'])->name('wealth-reg-id');
 });





//Gold Transaction
Route::middleware('auth')->group(function () {
    Route::controller(GoldtransactionController::class)->group(function () {
        Route::get('/gold-transaction', 'index')->name('gold-transaction');
        Route::post('/gold-transaction/store', 'store')->name('gold-transaction.store');
        Route::get('/total-saved-weight', 'showSavedWeight')->name('total-saved-weight');
    });
});

// Payment History
Route::get('/payment-goldhistory', [GoldPaymentHistoryController::class, 'index'])->name('view.goldhistory');
Route::get('/payment-wealthhistory', [WealthPaymentHistoryController::class, 'index'])->name('view.wealthhistory');


// Wealth Transaction
Route::middleware('auth')->group(function () {
    Route::get('scheme/wealth-scheme-details', [WealthtreasureController::class, 'showTransactionsPage'])->name('wealth-scheme-details');
    Route::post('/wealth-transaction/store', [WealthtreasureController::class, 'storeTransaction'])->name('wealth-transaction.store');
    Route::get('/total-saved-weight-wel', [WealthtreasureController::class, 'showSavedWeightWel'])->name('total-saved-weight-wel');
});

Route::get('/transactions', [WealthtransactionController::class, 'index'])->name('transactions.index');



Route::get('/wealthreceipt/{transaction_id}', [WealthReceiptController::class, 'show'])->name('wealthreceipt.show');
Route::post('/wealthreceipt/generate', [WealthReceiptController::class, 'showAllTransactions'])->name('wealthreceipt.generate');



Route::get('/goldreceipt/{transaction_id}', [GoldReceiptController::class, 'show'])->name('goldreceipt.show');
Route::post('/goldreceipt/generate', [GoldReceiptController::class, 'showAllTransactions'])->name('goldreceipt.generate');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');


Route::controller(PolicyController::class)->group(function () {
    Route::get('/condition','showTerms')->name('condition.show');

});


Route::get('/privacy-policy', [PolicyController::class, 'showPrivacy'])->name('privacy');






Route::get('/schemes',[SchemeController::class, 'index'])->name('schemes');

Route::controller(SchemeController::class)->group(function () {
    Route::get('/schemes/gold','showGold')->name('schemes.gold');

});


Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::middleware('auth')->group(function () {
    Route::get('/gold-otp', [OtpController::class, 'goldotp'])->name('gold-otp');
    Route::post('/validate-goldotp', [OtpController::class,  'validateOtp'])->name('validate.goldotp');
    Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');
    Route::get('/wealth-otp', [OtpController::class, 'wealthotp'])->name('wealth-otp');
    Route::post('/validate-wealthotp', [OtpController::class,  'validatewealthOtp'])->name('validate.wealthotp');
    Route::post('/resend-wealthotp', [OtpController::class, 'resendwealthOtp'])->name('resend.wealthotp');

});















