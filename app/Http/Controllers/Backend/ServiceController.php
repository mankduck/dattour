<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreServiceCategoryRequest;
use App\Http\Requests\Service\UpdateSeviceCategoryRequest;
use App\Repositories\Interfaces\ServiceRepositoryInterface as ServiceRepository;
use App\Services\Interfaces\ServiceServiceInterface as ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepository;
    protected $serviceService;
    public function __construct(
        ServiceRepository $ServiceRepository,
        ServiceService $ServiceService
    ) {
        $this->serviceRepository = $ServiceRepository;
        $this->serviceService = $ServiceService;
    }

    public function index(Request $request)
    {
        $config['model'] = 'Service';
        $config['seo'] = config('apps.messages.service');
        $service = $this->serviceService->paginate($request);
        return view('backend.service.index', compact('config', 'service'));
    }

    public function create()
    {
        $config['model'] = 'TourCategory';
        $config['seo'] = config('apps.messages.tourCategory');
        return view('backend.tour.category.create', compact('config'));
    }


    public function store(StoreTourCategoryRequest $request)
    {
        if ($this->tourCategoryService->create($request)) {
            return redirect()->route('tour.category.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('tour.category.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'TourCategory';
        $config['seo'] = config('apps.messages.tourCategory');
        $tourCategory = $this->tourCategoryRepository->findById($id);
        return view('backend.tour.category.edit', compact('tourCategory', 'config'));
    }

    public function update(UpdateTourCategoryRequest $request, $id)
    {
        if ($this->tourCategoryService->update($id, $request)) {
            return redirect()->route('tour.category.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('tour.category.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.tourCategory');
        $tourCategory = $this->tourCategoryRepository->findById($id);
        return view('backend.tour.category.delete', compact('tourCategory', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->tourCategoryService->destroy($id)) {
            return redirect()->route('tour.category.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('tour.category.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}