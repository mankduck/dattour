<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreAccountRequest;
use App\Http\Requests\User\UpdateAccountRequest;
use App\Repositories\Interfaces\AccountRepositoryInterface as AccountRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface as RoleRepository;
use App\Services\Interfaces\AccountServiceInterface as AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountService;
    protected $accountRepository;
    protected $roleRepository;
    public function __construct(
        AccountRepository $accountRepository,
        AccountService $accountService,
        RoleRepository $roleRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->accountService = $accountService;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'account.index');
        $config['model'] = 'Account';
        $config['seo'] = config('apps.messages.account');
        $accounts = $this->accountService->paginate($request);
        return view('backend.user.account.index', compact('config', 'accounts'));
    }

    public function create()
    {
        $this->authorize('modules', 'account.create');
        $config['model'] = 'Account';
        $config['seo'] = config('apps.messages.account');
        $roles = $this->roleRepository->findByCondition([
            ['publish', '=', 2]
        ], true);
        return view('backend.user.account.create', compact('config', 'roles'));

    }

    public function store(StoreAccountRequest $request)
    {
        if ($this->accountService->create($request)) {
            return redirect()->route('account.index')->with('success', 'Thêm mới thành công.');
        }
        return redirect()->route('account.index')->with('error', 'Thêm mới không thành công. Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'account.edit');
        $account = $this->accountRepository->findById($id);
        $config['seo'] = config('apps.messages.account');
        $config['model'] = 'Account';
        $roles = $this->roleRepository->findByCondition([
            ['publish', '=', 2]
        ], true);
        return view('backend.user.account.edit', compact('config', 'account', 'roles'));
    }

    public function update(UpdateAccountRequest $request, $id)
    {
        if ($this->accountService->update($id, $request)) {
            return redirect()->route('account.index')->with('success', 'Sửa thành công.');
        }
        return redirect()->route('account.index')->with('error', 'Sửa không thành công. Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'account.delete');
        $config['seo'] = config('apps.messages.account');
        $account = $this->accountRepository->findById($id);
        return view('backend.user.account.delete', compact('account', 'config'));
    }

    public function destroy($id)
    {

        if ($this->accountService->destroy($id)) {
            return redirect()->route('account.index')->with('success', 'Cập nhật bản ghi thành công.');
        }
        return redirect()->route('account.index')->with('error', 'Cập nhật bản ghi không thành công. Vui lòng thử lại');
    }
}
