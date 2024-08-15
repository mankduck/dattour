<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAccountController extends Controller
{
    protected $provincePepository;
    protected $userService;
    protected $accountService;
    public function __construct(
        UserRepository $userRepository,
        UserService $userService,
        ProvinceRepository $provinceRepository
    ) {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->provincePepository = $provinceRepository;
    }

    public function index()
    {
        $account = Auth::user();
        $user = $account->user;
        $provinces = $this->provincePepository->all();

        return view('auth.manager', compact('user', 'provinces'));
    }
}
