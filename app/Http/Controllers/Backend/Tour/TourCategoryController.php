<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\StoreTourCategoryRequest;
use App\Http\Requests\Tour\UpdateTourCategoryRequest;
use App\Repositories\Interfaces\TourCategoryRepositoryInterface as TourCategoryRepository;
use App\Services\Interfaces\TourCategoryServiceInterface as TourCategoryService;
use Illuminate\Http\Request;

class TourCategoryController extends Controller
{
    protected $tourCategoryService;
    protected $tourCategoryRepository;
    public function __construct(
        TourCategoryService $tourCategoryService,
        TourCategoryRepository $tourCategoryRepository
    ) {
        $this->tourCategoryService = $tourCategoryService;
        $this->tourCategoryRepository = $tourCategoryRepository;
    }

    public function index(Request $request)
    {
        $config['model'] = 'TourCategory';
        $config['seo'] = config('apps.messages.tourCategory');
        $tourCategories = $this->tourCategoryService->paginate($request);
        return view('backend.tour.category.index', compact('config', 'tourCategories'));
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
            return redirect()->route('guide.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('guide.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
