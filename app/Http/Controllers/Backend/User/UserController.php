<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $provinceRepository;

    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        ProvinceRepository $provinceRepository,

    ) {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->provinceRepository = $provinceRepository;

    }


    public function index(Request $request)
    {
        $users = $this->userService->paginate($request);
        $config['model'] = 'User';
        $config['seo'] = config('apps.messages.user');

        // dd($users);
        return view('backend.user.customer.index', compact('users', 'config'));
    }



    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config['model'] = 'User';
        $config['seo'] = config('apps.messages.user');
        return view('backend.user.customer.create', compact('config', 'provinces'));
    }


    // public function store(StoreTourCategoryRequest $request)
    // {
    //     if ($this->tourCategoryService->create($request)) {
    //         return redirect()->route('tour.category.index')->with('success', 'Thêm mới bản ghi thành công');
    //     }
    //     return redirect()->route('tour.category.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    // }



    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $config['seo'] = config('apps.messages.customer');
        return view('backend.user.customer.update', compact('user', 'provinces', 'config'));
    }


    public function update($id, Request $request)
    {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('customer.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('customer.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.customer');
        $user = $this->userRepository->findById($id);
        return view('backend.user.customer.delete', compact('user', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('customer.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('customer.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
