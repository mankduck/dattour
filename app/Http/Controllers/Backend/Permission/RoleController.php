<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreRoleRequest;
use App\Http\Requests\Permission\UpdateRoleRequest;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface as RoleRepository;
use App\Services\Interfaces\RoleServiceInterface as RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    protected $roleRepository;
    protected $permissionRepository;
    public function __construct(
        RoleService $roleService,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    ) {
        $this->roleService = $roleService;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    public function index(Request $request)
    {
        $this->authorize('modules', 'role.index');
        $roles = $this->roleService->paginate($request);
        $config['model'] = 'Role';
        $config['seo'] = config('apps.messages.role');
        return view('backend.permission.role.index', compact('roles', 'config'));
    }



    public function create()
    {
        $this->authorize('modules', 'role.create');
        $config['model'] = 'Role';
        $config['seo'] = config('apps.messages.role');
        return view('backend.permission.role.create', compact('config'));
    }


    public function store(StoreRoleRequest $request)
    {
        if ($this->roleService->create($request)) {
            return redirect()->route('role.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('role.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }



    public function edit($id)
    {
        $this->authorize('modules', 'role.edit');
        $role = $this->roleRepository->findById($id);
        $config['model'] = 'Role';
        $config['seo'] = config('apps.messages.role');
        return view('backend.permission.role.edit', compact('role', 'config'));
    }


    public function update($id, UpdateRoleRequest $request)
    {
        if ($this->roleService->update($id, $request)) {
            return redirect()->route('role.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('role.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }



    public function permission()
    {
        $this->authorize('modules', 'role.permission');
        $roles = $this->roleRepository->all();

        $permissions = $this->permissionRepository->all();
        $config['seo'] = config('apps.messages.role');
        return view(
            'backend.permission.role.permission',
            compact(
                'roles',
                'permissions',
                'config',
            )
        );
    }

    public function updatePermission(Request $request)
    {
        if ($this->roleService->setPermission($request)) {
            return redirect()->route('role.index')->with('success', 'Cập nhật quyền thành công');
        }
        return redirect()->route('role.index')->with('error', 'Có vấn đề xảy ra, Hãy thử lại');
    }


    // public function delete($id)
    // {
    //     // $this->authorize('modules', 'user.delete');
    //     $config['seo'] = config('apps.messages.user');
    //     $user = $this->userRepository->findById($id);
    //     return view('backend.user.customer.delete', compact('user', 'config', ));
    // }

    // public function destroy($id)
    // {
    //     if ($this->userService->destroy($id)) {
    //         return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
    //     }
    //     return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    // }

}
