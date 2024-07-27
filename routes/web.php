<?php


/*FRONTEND */

use App\Http\Controllers\Frontend\TourController as FrontendTourController;
use App\Http\Controllers\Frontend\TourCategoryController as FrontendTourCategoryController;
use App\Http\Controllers\Frontend\BookingDetailController as FrontendBookingDetail;


<<<<<<< HEAD
=======
/* ROUTE AJAX */
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\Backend\PostController;
/*FRONTEND */

use App\Http\Controllers\Frontend\TourController as FrontendTourController;
use App\Http\Controllers\Frontend\TourCategoryController as FrontendTourCategoryController;
use App\Http\Controllers\Frontend\BookingDetailController as FrontendBookingDetail;


>>>>>>> Stashed changes
>>>>>>> origin/VietDuong

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

<<<<<<< HEAD




require __DIR__ . '/backend.php';

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('frontend.index');
})->name('home.index');
=======
<<<<<<< Updated upstream
// Route::get('/', function () {
//     return view('welcome');
// });
=======



>>>>>>> origin/VietDuong

Route::get('/{slug}', [FrontendTourCategoryController::class, 'show'])->name('frontend.tour.list');


<<<<<<< HEAD
Route::get('/{slug}', [FrontendTourCategoryController::class, 'show'])->name('frontend.tour.list');
Route::get('/{category}/{slug}', [FrontendTourController::class, 'show'])->name('frontend.tour.detail');
=======
    Route::group(['prefix' => 'guide'], function () {
        Route::get('index', [GuideController::class, 'index'])->name('guide.index');
        Route::get('create', [GuideController::class, 'create'])->name('guide.create');
        Route::post('store', [GuideController::class, 'store'])->name('guide.store');
        Route::get('{id}/edit', [GuideController::class, 'edit'])->where(['id' => '[0-9]+'])->name('guide.edit');
        Route::post('{id}/update', [GuideController::class, 'update'])->where(['id' => '[0-9]+'])->name('guide.update');
        Route::get('{id}/delete', [GuideController::class, 'delete'])->where(['id' => '[0-9]+'])->name('guide.delete');
        Route::delete('{id}/destroy', [GuideController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('guide.destroy');
    });
>>>>>>> origin/VietDuong


Route::post('/booking', [FrontendBookingDetail::class, 'confirm'])->name('frontend.booking');

<<<<<<< HEAD

Route::get('destination', function () {
    return view('frontend.destination');
})->name('home.destination');
=======

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


    Route::group(['prefix' => 'booking'], function () {
        Route::get('index', [BookingDetailController::class, 'index'])->name('booking.index');
        Route::get('{id}/edit', [BookingDetailController::class, 'edit'])->where(['id' => '[0-9]+'])->name('booking.edit');
        Route::post('{id}/update', [BookingDetailController::class, 'update'])->where(['id' => '[0-9]+'])->name('booking.update');
        Route::get('{id}/delete', [BookingDetailController::class, 'delete'])->where(['id' => '[0-9]+'])->name('booking.delete');
        Route::delete('{id}/destroy', [BookingDetailController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('booking.destroy');
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




// Route::get('tour-list', [FrontendTourController::class, 'show'])->name('frontend.tour_list');

>>>>>>> Stashed changes
Route::get('/', function () {
    return view('fontend.prices.index');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        echo "Login";
    });
});
>>>>>>> origin/VietDuong
