<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class GuideController extends Controller
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
        $role = 'admin';
        $users = $this->userService->paginate($request, $role);
        $config['model'] = 'User';
        $config['seo'] = config('apps.messages.guide');

        // dd($users);
        return view('backend.user.guide.index', compact('users', 'config'));
    }


    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $config['seo'] = config('apps.messages.guide');
        return view('backend.user.guide.update', compact('user', 'provinces', 'config'));
    }


    public function update($id, Request $request)
    {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('guide.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('guide.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.guide');
        $user = $this->userRepository->findById($id);
        return view('backend.user.guide.delete', compact('user', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('guide.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('guide.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
