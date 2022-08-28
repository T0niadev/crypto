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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/wallet', [\App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
Route::get('/investment', [\App\Http\Controllers\InvestmentController::class, 'index'])->name('investment');
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/transaction', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
Route::get('/document', [\App\Http\Controllers\DocumentController::class, 'index'])->name('document');



Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('adminuser');
Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'] )->name('adminusercreate');
Route::post('/users/store', [\App\Http\Controllers\Admin\UserController::class, 'store'] )->name('adminuserstore');
Route::get('/users/edit/{user_id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('adminuseredit');
Route::post('/users/update', [\App\Http\Controllers\Admin\UserController::class, 'update'] )->name('adminuserupdate');


Route::get('/investments', [\App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('admininvest');
Route::get('/investments/create', [\App\Http\Controllers\Admin\InvestmentController::class, 'create'] )->name('admininvestcreate');
Route::post('/investments/store', [\App\Http\Controllers\Admin\InvestmentController::class, 'store'] )->name('admininveststore');
Route::get('/investments/edit/{investment_id}', [\App\Http\Controllers\Admin\InvestmentController::class, 'edit'])->name('admininvestedit');
Route::post('/investments/update', [\App\Http\Controllers\Admin\InvestmentController::class, 'update'] )->name('admininvestupdate');


Route::get('/deposits', [\App\Http\Controllers\Admin\DepositController::class, 'index'])->name('admindeposit');
Route::get('/deposits/create', [\App\Http\Controllers\Admin\DepositController::class, 'create'] )->name('admindepositcreate');
Route::post('/deposits/store', [\App\Http\Controllers\Admin\DepositController::class, 'store'] )->name('admindepositstore');
Route::get('/deposits/edit/{deposit_id}', [\App\Http\Controllers\Admin\DepositController::class, 'edit'])->name('admindepositedit');
Route::post('/deposits/update', [\App\Http\Controllers\Admin\DepositController::class, 'update'] )->name('admindepositupdate');

Route::get('/withdrawals', [\App\Http\Controllers\Admin\WithdrawalController::class, 'index'])->name('adminwithdrawal');
Route::get('/withdrawals/create', [\App\Http\Controllers\Admin\WithdrawalController::class, 'create'] )->name('adminwithdrawalcreate');
Route::post('/withdrawals/store', [\App\Http\Controllers\Admin\WithdrawalController::class, 'store'] )->name('adminwithdrawalstore');
Route::get('/withdrawals/edit/{withdrawal_id}', [\App\Http\Controllers\Admin\WithdrawalController::class, 'edit'])->name('adminwithdrawaledit');
Route::post('/withdrawals/update', [\App\Http\Controllers\Admin\WithdrawalController::class, 'update'] )->name('adminwithdrawalupdate');


Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
