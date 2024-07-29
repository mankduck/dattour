<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreGuideRequest;
use App\Http\Requests\User\UpdateGuideRequest;
use App\Repositories\Interfaces\AccountRepositoryInterface as AccountRepository;
use App\Repositories\Interfaces\GuideRepositoryInterface as GuideRepository;
use App\Services\Interfaces\GuideServiceInterface as GuideService;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    protected $guideService;
    protected $guideRepository;
    protected $accountRepository;


    public function __construct(
        GuideRepository $guideRepository,
        GuideService $guideService,
        AccountRepository $accountRepository

    ) {
        $this->guideRepository = $guideRepository;
        $this->guideService = $guideService;
        $this->accountRepository = $accountRepository;

    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'guide.index');
        $guides = $this->guideService->paginate($request);
        $config['model'] = 'Guide';
        $config['seo'] = config('apps.messages.guide');

        // dd($config);
        return view('backend.user.guide.index', compact('config', 'guides'));
    }

    public function create()
    {
        $this->authorize('modules', 'guide.create');
        $config['model'] = 'Guide';
        $config['seo'] = config('apps.messages.guide');
        $accounts = $this->accountRepository->findByCondition([
            ['role_id', '=', 3],
            ['publish', '=', 2]
        ], true);
        return view('backend.user.guide.create', compact('config', 'accounts'));
    }

    public function store(StoreGuideRequest $request)
    {
        if ($this->guideService->create($request)) {
            return redirect()->route('guide.index')->with('success', 'Thêm mới thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Thêm mới không thành công. Vui lòng thử lại');
    }

    public function edit($id)
    {
        $this->authorize('modules', 'guide.edit');
        $guide = $this->guideRepository->findById($id);
        $config['seo'] = config('apps.messages.guide');
        $config['model'] = 'Guide';

        $accounts = $this->accountRepository->findByCondition([
            ['role_id', '=', 3],
            ['publish', '=', 2]
        ], true);
        // dd($guides);

        return view('backend.user.guide.edit', compact('config', 'guide', 'accounts'));
    }

    public function update(UpdateGuideRequest $request, $id)
    {
        if ($this->guideService->update($id, $request)) {
            return redirect()->route('guide.index')->with('success', 'Sửa thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Sửa không thành công. Vui lòng thử lại');
    }

    public function delete($id)
    {
        $this->authorize('modules', 'guide.delete');
        $config['seo'] = config('apps.messages.guide');
        $guide = $this->guideRepository->findById($id);
        return view('backend.user.guide.delete', compact('guide', 'config'));
    }

    public function destroy($id)
    {

        if ($this->guideService->destroy($id)) {
            return redirect()->route('guide.index')->with('success', 'Xóa thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Xóa không thành công. Vui lòng thử lại');
    }
}

