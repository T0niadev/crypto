<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

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
Route::get('/users/edit/{user_id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('useredit');
Route::post('/users/update', [\App\Http\Controllers\Admin\UserController::class, 'update'] )->name('userupdate');


Route::get('/investments', [\App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('invest');
Route::get('/investments/create', [\App\Http\Controllers\Admin\InvestmentController::class, 'create'] )->name('investcreate');
Route::post('/investments/store', [\App\Http\Controllers\Admin\InvestmentController::class, 'store'] )->name('investstore');
Route::get('/investments/edit/{investment_id}', [\App\Http\Controllers\Admin\InvestmentController::class, 'edit'])->name('investedit');
Route::post('/investments/update', [\App\Http\Controllers\Admin\InvestmentController::class, 'update'] )->name('investupdate');


Route::get('/deposits', [\App\Http\Controllers\Admin\DepositController::class, 'index'])->name('deposit');
Route::get('/deposits/create', [\App\Http\Controllers\Admin\DepositController::class, 'create'] )->name('depositcreate');
Route::post('/deposits/store', [\App\Http\Controllers\Admin\DepositController::class, 'store'] )->name('depositstore');
Route::get('/deposits/edit/{deposit_id}', [\App\Http\Controllers\Admin\DepositController::class, 'edit'])->name('depositedit');
Route::post('/deposits/update', [\App\Http\Controllers\Admin\DepositController::class, 'update'] )->name('depositupdate');

Route::get('/withdrawals', [\App\Http\Controllers\Admin\WithdrawalController::class, 'index'])->name('withdrawal');
Route::get('/withdrawals/create', [\App\Http\Controllers\Admin\WithdrawalController::class, 'create'] )->name('withdrawalcreate');
Route::post('/withdrawals/store', [\App\Http\Controllers\Admin\WithdrawalController::class, 'store'] )->name('withdrawalstore');
Route::get('/withdrawals/edit/{withdrawal_id}', [\App\Http\Controllers\Admin\WithdrawalController::class, 'edit'])->name('withdrawaledit');
Route::post('/withdrawals/update', [\App\Http\Controllers\Admin\WithdrawalController::class, 'update'] )->name('withdrawalupdate');

Route::get('/packages', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('package');
Route::get('/packages/create', [\App\Http\Controllers\Admin\PackageController::class, 'create'] )->name('package.create');
Route::post('/packages/store', [\App\Http\Controllers\Admin\PackageController::class, 'store'] )->name('package.store');
Route::get('/packages/{package}/edit', [\App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('package.edit');
Route::post('/packages/{package}/update', [\App\Http\Controllers\Admin\PackageController::class, 'update'] )->name('package.update');
Route::delete('/packages/{package}/destroy', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('package.destroy');
