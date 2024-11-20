<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserDetailsController;
use App\Http\Controllers\Admin\GoldDetailsController;
use App\Http\Controllers\Admin\WealthDetailsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GoldSavingsSchemeController;
use App\Http\Controllers\Admin\WealthTreasureSchemeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;




Route::group(['prefix'=>'admin'], function(){



Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin_dashboard');


    Route::controller(AdminController::class)->group(function () {


        Route::get('/schemes/wealth', 'schemeWealth')->name('admin_schemes_wealth');
        Route::get('/terms', 'terms')->name('admin_terms');
        Route::get('/privacy', 'privacy')->name('admin_privacy');
        Route::get('/feedbacks', 'feedback')->name('admin_feedback');
        Route::post('/terms/storeOrUpdate', 'storeOrUpdateDescription')->name('description.storeOrUpdate');
        Route::post('/privacy/storeOrUpdate', 'storeOrUpdateDescriptionPrivacy')->name('privacy.storeOrUpdate');

    });

    Route::controller(UserDetailsController::class)->group(function () {

        Route::get('/customer/index', 'customerindex')->name('admin_customer');
        Route::post('/customer/delete', 'customerdestroy')->name('admin_customer_destroy');
    });

    Route::controller(GoldDetailsController::class)->group(function () {

        Route::get('/goldsavings/index', 'goldindex')->name('admin_gold');
        Route::post('/gold/delete', 'golddestroy')->name('admin_gold_destroy');
        Route::get('/goldsavings/view/{id}','goldview')->name('admin_gold_view');
        Route::get('/gold/transaction/{id}','show')->name('admin_gold_transaction');
    });

    Route::controller(WealthDetailsController::class)->group(function () {

        Route::get('/wealthtreasure/index', 'wealthindex')->name('admin_wealth');
        Route::post('/wealth/delete', 'wealthdestroy')->name('admin_wealth_destroy');
        Route::get('/wealthtreasure/view/{id}','wealthview')->name('admin_wealth_view');
        Route::get('/wealth/transaction/{id}','show')->name('admin_wealth_transaction');
    });


    // Route::get('/gold-savings-scheme/index', [GoldSavingsSchemeController::class, 'index'])->name('admingold-savings-scheme.index');
    // Route::post('/gold-savings-scheme/store', [GoldSavingsSchemeController::class, 'storeOrUpdateGold'])->name('admin.gold-savings-scheme.store');

    Route::controller(GoldSavingsSchemeController::class)->group(function () {

        Route::get('/gold-savings-scheme', 'index')->name('admin.gold-savings-scheme.index');
        Route::post('/gold-savings-scheme/store', 'storeOrUpdateGold')->name('admin.gold-savings-scheme.store');

    });

    Route::controller(WealthTreasureSchemeController::class)->group(function () {


        Route::get('/wealth-treasure-scheme', 'index')->name('admin.wealth-treasure-scheme.index');
        Route::post('/wealth-treasure-scheme/store', 'storeOrUpdateWealth')->name('admin.wealth-treasure-scheme.store');

    });



    Route::get('/registration-data', [AdminController::class,  'getRegistrationData'])->name('registration.data');

    Route::get('/income-expense-summary', [AdminController::class, 'showIncomeExpenseSummary'])->name('income-expense-summary');

    Route::group(['prefix' => 'faq'], function() {
        Route::controller(FaqController::class)->group(function () {
            Route::get('/', 'index')->name('faq.index');
            Route::get('create', 'create')->name('faq.create');
            Route::post('store', 'store')->name('faq.store');
            Route::get('edit/{id}', 'edit')->name('faq.edit');
            Route::post('update/{id}', 'update')->name('faq.update');
            Route::post('destroy', 'destroy')->name('faq.destroy');
        });
});


Route::controller(ContactController::class)->group(function () {
    Route::get('/contact-us', 'index')->name('admin_contact');
    Route::post('/contact/store', 'storeOrUpdate')->name('admin.contact.storeOrUpdate');

});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about-us', 'index')->name('admin_about');
    Route::post('/about-us/store', 'store')->name('aboutus.store');

});




});















