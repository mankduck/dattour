<?php

use App\Http\Controllers\Backend\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('fontend.prices.index');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        echo "Login";
    });
});