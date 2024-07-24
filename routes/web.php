<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Tour\DestinationController;
use App\Http\Controllers\Backend\Tour\TourCategoryController;
use App\Http\Controllers\Backend\Tour\TourController;
use App\Http\Controllers\Backend\User\CustomerController;
use App\Http\Controllers\Backend\User\GuideController;
use App\Http\Controllers\Backend\ServiceController;
// use App\Http\Controllers\Backend\Guide\GuideController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Route;


/* ROUTE AJAX */
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;


/*FRONTEND */

use App\Http\Controllers\Frontend\TourController as FrontendTourController;
use App\Http\Controllers\Frontend\TourCategoryController as FrontendTourCategoryController;


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



Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        echo "Login";
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'user'], function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
        Route::post('{id}/update', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
        Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete');
        Route::delete('{id}/destroy', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy');
    });

    Route::group(['prefix' => 'guide'], function () {
        Route::get('index', [GuideController::class, 'index'])->name('guide.index');
        Route::get('create', [GuideController::class, 'create'])->name('guide.create');
        Route::post('store', [GuideController::class, 'store'])->name('guide.store');
        Route::get('{id}/edit', [GuideController::class, 'edit'])->where(['id' => '[0-9]+'])->name('guide.edit');
        Route::post('{id}/update', [GuideController::class, 'update'])->where(['id' => '[0-9]+'])->name('guide.update');
        Route::get('{id}/delete', [GuideController::class, 'delete'])->where(['id' => '[0-9]+'])->name('guide.delete');
        Route::delete('{id}/destroy', [GuideController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('guide.destroy');
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

    Route::group(['prefix' => 'service'], function () {
        Route::get('index', [ServiceController::class, 'index'])->name('service.index');
        Route::get('create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('{id}/edit', [ServiceController::class, 'edit'])->where(['id' => '[0-9]+'])->name('service.edit');
        Route::post('{id}/update', [ServiceController::class, 'update'])->where(['id' => '[0-9]+'])->name('service.update');
        Route::get('{id}/delete', [ServiceController::class, 'delete'])->where(['id' => '[0-9]+'])->name('service.delete');
        Route::delete('{id}/destroy', [ServiceController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('service.destroy');
    });


    Route::group(['prefix' => 'destination'], function () {
        Route::get('index', [DestinationController::class, 'index'])->name('destination.index');
        Route::get('create', [DestinationController::class, 'create'])->name('destination.create');
        Route::post('store', [DestinationController::class, 'store'])->name('destination.store');
        Route::get('{id}/edit', [DestinationController::class, 'edit'])->where(['id' => '[0-9]+'])->name('destination.edit');
        Route::post('{id}/update', [DestinationController::class, 'update'])->where(['id' => '[0-9]+'])->name('destination.update');
        Route::get('{id}/delete', [DestinationController::class, 'delete'])->where(['id' => '[0-9]+'])->name('destination.delete');
        Route::delete('{id}/destroy', [DestinationController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('destination.destroy');
    });

    Route::group(['prefix' => 'tour'], function () {
        Route::get('index', [TourController::class, 'index'])->name('tour.index');
        Route::get('create', [TourController::class, 'create'])->name('tour.create');
        Route::post('store', [TourController::class, 'store'])->name('tour.store');
        Route::get('{id}/edit', [TourController::class, 'edit'])->where(['id' => '[0-9]+'])->name('tour.edit');
        Route::post('{id}/update', [TourController::class, 'update'])->where(['id' => '[0-9]+'])->name('tour.update');
        Route::get('{id}/delete', [TourController::class, 'delete'])->where(['id' => '[0-9]+'])->name('tour.delete');
        Route::delete('{id}/destroy', [TourController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('tour.destroy');
    });

});

//ROUTES AJAX

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');




// Route::get('tour-list', [FrontendTourController::class, 'show'])->name('frontend.tour_list');

Route::get('/', function () {
    return view('frontend.index');
})->name('home.index');
Route::get('/{slug}', [FrontendTourCategoryController::class, 'show'])->name('frontend.tour.list');
Route::get('/{category}/{slug}', [FrontendTourController::class, 'show'])->name('frontend.tour.detail');

Route::get('destination', function () {
    return view('frontend.destination');
})->name('home.destination');
