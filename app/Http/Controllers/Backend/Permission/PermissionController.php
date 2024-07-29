<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Services\Interfaces\PermissionServiceInterface as PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    protected $permissionService;
    protected $permissionRepository;
    protected $accountRepository;
    public function __construct(
        PermissionRepository $permissionRepository,
        PermissionService $permissionService
    ) {
        $this->permissionRepository = $permissionRepository;
        $this->permissionService = $permissionService;
    }


    public function index(Request $request)
    {
        // $this->authorize('modules', 'permission.index');
        $permissions = $this->permissionService->paginate($request);
        $config['model'] = 'Permission';
        $config['seo'] = config('apps.messages.permission');

        // dd($config);
        return view('backend.permission.permission.index', compact('config', 'permissions'));
    }

    public function create()
    {
        // $this->authorize('modules', 'permission.create');
        $config['model'] = 'Permission';
        $config['seo'] = config('apps.messages.permission');
        return view('backend.permission.permission.create', compact('config'));
    }

    public function store(StorePermissionRequest $request)
    {
        if ($this->permissionService->create($request)) {
            return redirect()->route('permission.index')->with('success', 'Thêm mới thành công.');
        }
        return redirect()->route('permission.index')->with('error', 'Thêm mới không thành công. Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'permission.edit');
        $permission = $this->permissionRepository->findById($id);
        $config['seo'] = config('apps.messages.permission');
        $config['model'] = 'Permission';
        return view('backend.permission.permission.edit', compact('config', 'permission'));
    }

    public function update(UpdatePermissionRequest $request, $id)
    {
        if ($this->permissionService->update($id, $request)) {
            return redirect()->route('permission.index')->with('success', 'Sửa thành công.');
        }
        return redirect()->route('permission.index')->with('error', 'Sửa không thành công. Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'permission.delete');
        $config['seo'] = config('apps.messages.permission');
        $permission = $this->permissionRepository->findById($id);
        return view('backend.permission.permission.delete', compact('permission', 'config'));
    }

    public function destroy($id)
    {

        if ($this->permissionService->destroy($id)) {
            return redirect()->route('permission.index')->with('success', 'Cập nhật bản ghi thành công.');
        }
        return redirect()->route('permission.index')->with('error', 'Cập nhật bản ghi không thành công. Vui lòng thử lại');
    }
}
