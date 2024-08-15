<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ManagerAccountController;
use App\Http\Controllers\Frontend\OrderTrackingController;


// Route::group(['middleware' => ['auth']], function () {
Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('order-tracking', [OrderTrackingController::class, 'index'])->name('order_tracking');

Route::get('manager-account/{username}', [ManagerAccountController::class, 'index'])->name('manager_account');


// });