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
Route::get('/create/deposit', [\App\Http\Controllers\WalletController::class, 'create'])->name('deposit.create');
Route::get('/investment', [\App\Http\Controllers\InvestmentController::class, 'index'])->name('investment');
Route::get('/package', [\App\Http\Controllers\PackageController::class, 'index'])->name('package');
Route::get('/investment/add/{package_id}', [\App\Http\Controllers\InvestmentController::class, 'create'])->name('addinvestment');
Route::post('/investments/store', [\App\Http\Controllers\InvestmentController::class, 'store'])->name('storeinvestment');
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::post('/edit/profile', [\App\Http\Controllers\UserController::class, 'infoChange'])->name('editprofile');
Route::get('/transaction', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
Route::get('/document', [\App\Http\Controllers\DocumentController::class, 'index'])->name('document');
Route::post('/submit/document', [\App\Http\Controllers\DocumentController::class, 'store'])->name('submitdocument');

Route::get('/withdrawal', [\App\Http\Controllers\WithdrawalController::class, 'index'])->name('withdrawal');
Route::post('/withdrawal/store', [\App\Http\Controllers\WithdrawalController::class, 'store'])->name('withdrawaladd');

Route::get('/depositform', [\App\Http\Controllers\DepositController::class, 'index'])->name('depositform');
Route::post('/depositform/store', [\App\Http\Controllers\DepositController::class, 'store'])->name('depositformstore');



Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});