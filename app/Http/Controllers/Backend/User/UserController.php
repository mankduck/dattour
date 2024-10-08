<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\Interfaces\AccountRepositoryInterface as AccountRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $provinceRepository;
    protected $accountRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        ProvinceRepository $provinceRepository,
        AccountRepository $accountRepository

    ) {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->provinceRepository = $provinceRepository;
        $this->accountRepository = $accountRepository;

    }


    public function index(Request $request)
    {
        $this->authorize('modules', 'user.index');
        $role = 'user';
        $users = $this->userService->paginate($request);
        $config['model'] = 'User';
        $config['seo'] = config('apps.messages.user');
        return view('backend.user.customer.index', compact('users', 'config'));
    }



    public function create()
    {
        $this->authorize('modules', 'user.create');
        $provinces = $this->provinceRepository->all();
        $accounts = $this->accountRepository->findByCondition([
            ['role_id', '=', 2],
            ['publish', '=', 2]
        ], true);
        // dd($accounts);
        $config['model'] = 'User';
        $config['seo'] = config('apps.messages.user');
        return view('backend.user.customer.create', compact('config', 'provinces', 'accounts'));
    }


    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('backend.user.customer.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }



    public function edit($id)
    {
        $this->authorize('modules', 'user.edit');
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $accounts = $this->accountRepository->findByCondition([
            ['role_id', '=', 2],
            ['publish', '=', 2]
        ], true);
        $config['seo'] = config('apps.messages.user');
        return view('backend.user.customer.update', compact('user', 'provinces', 'config', 'accounts'));
    }


    public function update($id, UpdateUserRequest $request)
    {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.user');
        $user = $this->userRepository->findById($id);
        return view('backend.user.customer.delete', compact('user', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
