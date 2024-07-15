<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Tour\TourCategoryController;
use App\Http\Controllers\Backend\User\CustomerController;
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

Route::group(['prefix' => 'auth'], function () {
        Route::get('login', function () {
            echo "Login";
        });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'guide'], function () {
        Route::get('index', [GuideController::class, 'index'])->name('guide.index');
        Route::get('{id}/edit', [GuideController::class, 'edit'])->where(['id' => '[0-9]+'])->name('guide.edit');
        Route::post('{id}/update', [GuideController::class, 'update'])->where(['id' => '[0-9]+'])->name('guide.update');
        Route::get('{id}/delete', [GuideController::class, 'delete'])->where(['id' => '[0-9]+'])->name('guide.delete');
        Route::delete('{id}/destroy', [GuideController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('guide.destroy');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('index', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('{id}/edit', [CustomerController::class, 'edit'])->where(['id' => '[0-9]+'])->name('customer.edit');
        Route::post('{id}/update', [CustomerController::class, 'update'])->where(['id' => '[0-9]+'])->name('customer.update');
        Route::get('{id}/delete', [CustomerController::class, 'delete'])->where(['id' => '[0-9]+'])->name('customer.delete');
        Route::delete('{id}/destroy', [CustomerController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('customer.destroy');
    });

    Route::group(['prefix' => 'tour-category'], function () {
        Route::get('index', [TourCategoryController::class, 'index'])->name('tour.category.index');
        Route::get('create', [TourCategoryController::class, 'create'])->name('tour.category.create');
        Route::post('store', [TourCategoryController::class, 'store'])->name('tour.category.store');
        Route::get('{id}/edit', [TourCategoryController::class, 'edit'])->where(['id' => '[0-9]+'])->name('tour.category.edit');
        Route::post('{id}/update', [TourCategoryController::class, 'update'])->where(['id' => '[0-9]+'])->name('tour.category.update');
        Route::get('{id}/delete', [TourCategoryController::class, 'delete'])->where(['id' => '[0-9]+'])->name('tour.category.delete');
        Route::delete('{id}/destroy', [TourCategoryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('tour.category.destroy');
    });

});

//ROUTES AJAX

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');