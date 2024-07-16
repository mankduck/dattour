<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //Khai Báo Interface và Implementation
    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface' => 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\TourCategoryServiceInterface' => 'App\Services\TourCategoryService',
        'App\Repositories\Interfaces\TourCategoryRepositoryInterface' => 'App\Repositories\TourCategoryRepository',

        'App\Services\Interfaces\ServiceServiceInterface' => 'App\Services\ServiceService',
        'App\Repositories\Interfaces\ServiceRepositoryInterface' => 'App\Repositories\ServiceRepository',

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
        //

        Schema::defaultStringLength(255);
    }
}
