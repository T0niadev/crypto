<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/wallet', [\App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
    // Route::get('/pay', [\App\Http\Controllers\WalletController::class, 'pay'])->name('payform');
    Route::get('/investment', [\App\Http\Controllers\InvestmentController::class, 'index'])->name('investment');
    // Route::get('/package', [\App\Http\Controllers\PackageController::class, 'index'])->name('package');
    Route::get('/investment/add/{package_id}', [\App\Http\Controllers\InvestmentController::class, 'create'])->name('addinvestment');
    Route::post('/investments/store', [\App\Http\Controllers\InvestmentController::class, 'store'])->name('storeinvestment');
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::post('/edit/profile', [\App\Http\Controllers\UserController::class, 'infoChange'])->name('editprofile');
    Route::get('/transaction', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
    Route::get('/document', [\App\Http\Controllers\DocumentController::class, 'index'])->name('document');
    Route::post('/submit/document', [\App\Http\Controllers\DocumentController::class, 'store'])->name('submitdocument');



    Route::get('/deposit/edit/{deposit}', [\App\Http\Controllers\DepositController::class, 'usereditdeposit'])->name('userdepositedit');
    Route::put('/deposit/update/{deposit}', [\App\Http\Controllers\DepositController::class, 'userupdatedeposit'] )->name('userdepositupdate');

    Route::post('/update/status/{deposit}', [\App\Http\Controllers\DepositController::class, 'userupdatestatus'] )->name('userstatusupdate');

    Route::get('/withdrawal', [\App\Http\Controllers\WithdrawalController::class, 'index'])->name('withdrawal');

    Route::post('/withdrawal/store', [\App\Http\Controllers\WithdrawalController::class, 'store'])->name('withdrawaladd');

    Route::get('/depositform', [\App\Http\Controllers\DepositController::class, 'index'])->name('depositform');

    Route::get('/showdeposit', [\App\Http\Controllers\DepositController::class, 'show'])->name('showdeposit');

    Route::post('/depositform/store', [\App\Http\Controllers\DepositController::class, 'store'])->name('depositformstore');

    // Route::get('/pay/bitcoin', [\App\Http\Controllers\PayController::class, 'paybitcoin'])->name('paybitcoin');



    Route::prefix('google')->name('google.')->group(function () {
        Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
        Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
    });



    // Route::match(['get', 'post'], '/payments/crypto/pay', Victorybiz\LaravelCryptoPaymentGateway\Http\Controllers\CryptoPaymentController::class)
    //     ->name('payments.crypto.pay');

    // Route::get('/coinbase/webhook', [App\Http\Controllers\CoinbaseController::class, 'initiatePayment'])->name('coinbase.payment');


    // // You you need to create your own callback controller and define the route below
    // // The callback route should be a publicly accessible route with no auth
    // // However, you may also exclude the route from CSRF Protection by adding their URIs to the $except property of the VerifyCsrfToken middleware.
    // Route::post('/payments/crypto/callback', [App\Http\Controllers\Payment\PaymentController::class, 'callback'])
    //     ->withoutMiddleware(['web', 'auth']);
});
