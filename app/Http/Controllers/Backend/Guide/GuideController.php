<?php

namespace App\Http\Controllers\Backend\Guide;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guide\StoreGuideRequest;
use App\Http\Requests\Guide\UpdateGuideRequest;
use App\Repositories\Interfaces\GuideRepositoryInterface as GuideRepository;
use App\Services\Interfaces\GuideServiceInterface as GuideService;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    protected $guideService;
    protected $guideRepository;

    public function __construct(
        GuideRepository $guideRepository,
        GuideService $guideService,
    ){
        $this->guideRepository = $guideRepository;
        $this->guideService = $guideService;
    }

    public function index(Request $request){
        $guides = $this->guideService->paginate($request);
        $config['model'] = 'Guide';
        $config['seo'] = config('apps.messages.guide');

        // dd($config);
        return view('backend.user.guide.index', compact('config', 'guides'));
    }

    public function create(){
        $config['model'] = 'Guide';
        $config['seo'] = config('apps.messages.guide');

        return view('backend.user.guide.create', compact('config'));
    }

    public function store(StoreGuideRequest $request){
        if($this->guideService->create($request)){
            return redirect()->route('guide.index')->with('success', 'Thêm mới thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Thêm mới không thành công. Vui lòng thử lại');
    }

    public function edit($id){
        $guides = $this->guideRepository->findById($id);
        $config['seo'] = config('apps.messages.guide');
        $config['model'] = 'Guide';


        // dd($guides);

        return view('backend.user.guide.edit', compact('config', 'guides'));
    }

    public function update(UpdateGuideRequest $request, $id){
        if($this->guideService->update($id, $request)){
            return redirect()->route('guide.index')->with('success', 'Sửa thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Sửa không thành công. Vui lòng thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.guide');
        $guide = $this->guideRepository->findById($id);
        return view('backend.user.guide.delete', compact('guide', 'config'));
    }

    public function destroy($id){

        if($this->guideService->destroy($id)){
            return redirect()->route('guide.index')->with('success', 'Xóa thành công.');
        }
        return redirect()->route('guide.index')->with('error', 'Xóa không thành công. Vui lòng thử lại');
    }
}
