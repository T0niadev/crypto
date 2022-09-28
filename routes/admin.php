<?php

use Illuminate\Support\Facades\Route;

// Dashboard
// Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/change', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'] )->name('usercreate');
Route::post('/users/store', [\App\Http\Controllers\Admin\UserController::class, 'store'] )->name('userstore');
Route::post('/users/search', [\App\Http\Controllers\Admin\UserController::class, 'search'])->name('searchusers');

Route::post('/users/update', [\App\Http\Controllers\Admin\UserController::class, 'update'] )->name('userupdate');

Route::get('/wallet/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'editwallet'])->name('wallet.edit');
Route::put('/wallet/update/{user}', [\App\Http\Controllers\Admin\UserController::class, 'updatewallet'] )->name('wallet.update');

Route::get('/packages/edit/{package}', [\App\Http\Controllers\Admin\PackageController::class, 'editpackage'])->name('package.edit');
Route::put('/packages/update/{package}', [\App\Http\Controllers\Admin\PackageController::class, 'updatepackage'] )->name('package.update');

Route::get('/investment/edit/{investment}', [\App\Http\Controllers\Admin\InvestmentController::class, 'editinvestment'])->name('investment.edit');
Route::put('/investment/update/{investment}', [\App\Http\Controllers\Admin\InvestmentController::class, 'updateinvestment'] )->name('investment.update');

Route::get('/deposits/edit/{deposit}', [\App\Http\Controllers\Admin\DepositController::class, 'editdeposit'])->name('deposit.edit');
Route::put('/deposits/update/{deposit}', [\App\Http\Controllers\Admin\DepositController::class, 'updatedeposit'] )->name('deposit.update');

Route::get('/withdrawals/edit/{withdrawal}', [\App\Http\Controllers\Admin\WithdrawalController::class, 'editwithdrawal'])->name('withdrawal.edit');
Route::put('/withdrawals/update/{withdrawal}', [\App\Http\Controllers\Admin\WithdrawalController::class, 'updatewithdrawal'] )->name('withdrawal.update');

Route::get('/investments', [\App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('invest');
Route::get('/investments/create', [\App\Http\Controllers\Admin\InvestmentController::class, 'create'] )->name('investcreate');
Route::post('/investments/store', [\App\Http\Controllers\Admin\InvestmentController::class, 'store'] )->name('investstore');
Route::get('/investments/edit/{investment_id}', [\App\Http\Controllers\Admin\InvestmentController::class, 'edit'])->name('investedit');
Route::post('/investments/update', [\App\Http\Controllers\Admin\InvestmentController::class, 'update'] )->name('investupdate');
Route::post('/investments/search', [\App\Http\Controllers\Admin\InvestmentController::class, 'search'])->name('searchinvestment');


Route::get('/deposits', [\App\Http\Controllers\Admin\DepositController::class, 'index'])->name('deposit');
Route::get('/deposits/create', [\App\Http\Controllers\Admin\DepositController::class, 'create'] )->name('depositcreate');
Route::post('/deposits/store', [\App\Http\Controllers\Admin\DepositController::class, 'store'] )->name('depositstore');
Route::get('/deposits/edit/{deposit_id}', [\App\Http\Controllers\Admin\DepositController::class, 'edit'])->name('depositedit');
Route::post('/deposits/update', [\App\Http\Controllers\Admin\DepositController::class, 'update'] )->name('depositupdate');
Route::post('/deposits/search', [\App\Http\Controllers\Admin\DepositController::class, 'search'])->name('searchdeposit');

Route::get('/withdrawals', [\App\Http\Controllers\Admin\WithdrawalController::class, 'index'])->name('withdrawal');
Route::get('/confirmpayment', [\App\Http\Controllers\Admin\WithdrawalController::class, 'crypto'])->name('payss');
Route::get('/withdrawals/create', [\App\Http\Controllers\Admin\WithdrawalController::class, 'create'] )->name('withdrawalcreate');
Route::post('/withdrawals/store', [\App\Http\Controllers\Admin\WithdrawalController::class, 'store'] )->name('withdrawalstore');
Route::get('/withdrawals/edit/{withdrawal_id}', [\App\Http\Controllers\Admin\WithdrawalController::class, 'edit'])->name('withdrawaledit');
Route::post('/withdrawals/update', [\App\Http\Controllers\Admin\WithdrawalController::class, 'update'] )->name('withdrawalupdate');
Route::post('/withdrawal/search', [\App\Http\Controllers\Admin\WithdrawalController::class, 'search'])->name('searchwithdrawal');

Route::get('/packages', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('package');
Route::post('/packages/search', [\App\Http\Controllers\Admin\PackageController::class, 'search'])->name('searchpackage');
Route::get('/packages/fetchPackages', [\App\Http\Controllers\Admin\PackageController::class, 'fetchPackages'])->name('fetchPackages');
Route::get('/packages/create', [\App\Http\Controllers\Admin\PackageController::class, 'create'] )->name('package.create');
Route::post('/packages/store', [\App\Http\Controllers\Admin\PackageController::class, 'store'] )->name('package.store');


Route::delete('/packages/{package}/destroy', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('package.destroy');