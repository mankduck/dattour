<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\User\GuideController;
use Illuminate\Support\Facades\Route;


/* ROUTE AJAX */
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => 'user/guide'], function () {
    Route::get('index', [GuideController::class, 'index'])->name('guide.index');
    Route::get('{id}/edit', [GuideController::class, 'edit'])->where(['id' => '[0-9]+'])->name('guide.edit');
    Route::post('{id}/update', [GuideController::class, 'update'])->where(['id' => '[0-9]+'])->name('guide.update');
    Route::get('{id}/delete', [GuideController::class, 'delete'])->where(['id' => '[0-9]+'])->name('guide.delete');
    Route::delete('{id}/destroy', [GuideController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('guide.destroy');
});


//ROUTES AJAX

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');