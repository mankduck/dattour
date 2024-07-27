<?php


/*FRONTEND */

use App\Http\Controllers\Frontend\TourController as FrontendTourController;
use App\Http\Controllers\Frontend\TourCategoryController as FrontendTourCategoryController;
use App\Http\Controllers\Frontend\BookingDetailController as FrontendBookingDetail;


/* ROUTE AJAX */
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\PostController;



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





require __DIR__ . '/backend.php';

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('frontend.index');
})->name('home.index');

// Route::get('/', function () {
//     return view('welcome');
// });





Route::get('/{slug}', [FrontendTourCategoryController::class, 'show'])->name('frontend.tour.list');


Route::get('/{slug}', [FrontendTourCategoryController::class, 'show'])->name('frontend.tour.list');
Route::get('/{category}/{slug}', [FrontendTourController::class, 'show'])->name('frontend.tour.detail');


Route::post('/booking', [FrontendBookingDetail::class, 'confirm'])->name('frontend.booking');



Route::get('destination', function () {
    return view('frontend.destination');
})->name('home.destination');







// Route::get('tour-list', [FrontendTourController::class, 'show'])->name('frontend.tour_list');


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        echo "Login";
    });
});

