<?php

namespace App\Providers;

use App\Http\Controllers\Frontend\TourCategoryController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //Khai Báo Interface và Implementation
    public $bindings = [
        'App\Services\Interfaces\AccountServiceInterface' => 'App\Services\AccountService',
        'App\Repositories\Interfaces\AccountRepositoryInterface' => 'App\Repositories\AccountRepository',

        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\GuideServiceInterface' => 'App\Services\GuideService',
        'App\Repositories\Interfaces\GuideRepositoryInterface' => 'App\Repositories\GuideRepository',

        'App\Services\Interfaces\RoleServiceInterface' => 'App\Services\RoleService',
        'App\Repositories\Interfaces\RoleRepositoryInterface' => 'App\Repositories\RoleRepository',

        'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService',
        'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface' => 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\TourCategoryServiceInterface' => 'App\Services\TourCategoryService',
        'App\Repositories\Interfaces\TourCategoryRepositoryInterface' => 'App\Repositories\TourCategoryRepository',

        'App\Services\Interfaces\ServiceServiceInterface' => 'App\Services\ServiceService',
        'App\Repositories\Interfaces\ServiceRepositoryInterface' => 'App\Repositories\ServiceRepository',

        'App\Services\Interfaces\DestinationServiceInterface' => 'App\Services\DestinationService',
        'App\Repositories\Interfaces\DestinationRepositoryInterface' => 'App\Repositories\DestinationRepository',

        'App\Services\Interfaces\TourServiceInterface' => 'App\Services\TourService',
        'App\Repositories\Interfaces\TourRepositoryInterface' => 'App\Repositories\TourRepository',

        'App\Services\Interfaces\BookingDetailServiceInterface' => 'App\Services\BookingDetailService',
        'App\Repositories\Interfaces\BookingDetailRepositoryInterface' => 'App\Repositories\BookingDetailRepository',

        'App\Services\Interfaces\PostServiceInterface' => 'App\Services\PostService',
        'App\Repositories\Interfaces\PostRepositoryInterface' => 'App\Repositories\PostRepository',

        'App\Services\Interfaces\SystemServiceInterface' => 'App\Services\SystemService',
        'App\Repositories\Interfaces\SystemRepositoryInterface' => 'App\Repositories\SystemRepository',

        //Việc đăng ký các interface và implementation trong container của Laravel cho phép framework này biết cách tạo ra các instance của các class khi cần thiết.
    ];

    /**
     * Register any application services.
     */
    public function register(): void            //register Method: Đây là nơi đăng ký các bindings trong ứng dụng.
    {
        //Đăng Ký Binding trong Service Provider
        foreach ($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
            //bạn đăng ký các interface và lớp cụ thể của chúng bằng bind, giúp Laravel biết cách cung cấp các instance của lớp cụ thể khi một interface được yêu cầu
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layout.client', function ($view) {      //Đăng ký một view composer cho view frontend.layout
            app(TourCategoryController::class)->compose($view);
            //Sử dụng hàm app() để tạo một instance của HomeController và gọi method compose trên nó, truyền vào đối tượng view hiện tại.
        });


        Schema::defaultStringLength(255);
    }
}
