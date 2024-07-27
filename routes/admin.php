<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\Tour\TourCategoryController;
use App\Http\Controllers\Backend\User\CustomerController;
use App\Http\Controllers\Backend\User\GuideController;
use App\Http\Controllers\Backend\ServiceController;

use App\Http\Controllers\Backend\User\UserController;
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

    Route::group(['prefix' => 'post'], function () {
        Route::get('index', [PostController::class, 'index'])->name('post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('store', [PostController::class, 'store'])->name('post.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->where(['id' => '[0-9]+'])->name('post.edit');
        Route::post('{id}/update', [PostController::class, 'update'])->where(['id' => '[0-9]+'])->name('post.update');
        Route::get('{id}/delete', [PostController::class, 'delete'])->where(['id' => '[0-9]+'])->name('post.delete');
        Route::delete('{id}/destroy', [PostController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('post.destroy');
    });
});

//ROUTES AJAX

Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');
