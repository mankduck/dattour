<?php

namespace App\Services;

use App\Services\Interfaces\TourCategoryServiceInterface;
use App\Repositories\Interfaces\TourCategoryRepositoryInterface as TourCategoryRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class TourCategoryService
 * @package App\Services
 */
class TourCategoryService extends BaseService implements TourCategoryServiceInterface
{
    protected $tourCategoryRepository;


    public function __construct(
        TourCategoryRepository $tourCategoryRepository
    ) {
        $this->tourCategoryRepository = $tourCategoryRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $users = $this->tourCategoryRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'tour-category/index'],
        );

        return $users;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $tour = $this->tourCategoryRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }


    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);
            // dd($payload);
            $user = $this->tourCategoryRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->tourCategoryRepository->delete($id);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    private function paginateSelect()
    {
        return [
            'id',
            'image',
            'name',
            'publish',
            'slug'
        ];
    }


}
