<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class PostService
 * @package App\Services
 */
class PostService extends BaseService implements PostServiceInterface
{
    protected $postRepository;


    public function __construct(
        PostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;

        $users = $this->postRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/post/index'],
        );

        return $users;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $payload['user_id'] = 7;
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $tour = $this->postRepository->create($payload);
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
            $post = $this->postRepository->update($id, $payload);
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
            $tour = $this->postRepository->delete($id);

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




    public function createTour($request)
    {
        $payload = $request->only($this->payload());
        // dd($payload);
        $payload['price'] = (convert_price($payload['price']) ?? 0);
        $tour = $this->postRepository->create($payload);
        return $tour;
    }

    public function createTourDate($tour, $request)
    {
        $payload = $request->only('time');
        // dd($payload);
        $tourDate = $this->createTourDateArray($payload);
        $tourDates = $tour->tour_dates()->createMany($tourDate);
    }


    public function createTourDateArray(array $payload = [])
    {
        $tourDate = [];
        if (isset($payload['time']) && count($payload['time'])) {
            foreach ($payload['time'] as $key => $value) {
                $tourDate[] = [
                    'time' => ($payload['time'][$key]) ?? '',
                ];
            }
        }
        return $tourDate;
    }

    public function createTourService($tour, $request)
    {
        $payload = $request->only('service');
        $tourService = [];
        if (isset($payload['service']) && count($payload['service'])) {
            foreach ($payload['service'] as $key => $value) {
                $tourService[] = [
                    'service_id' => ($value ?? '')
                ];
            }
        }
        $tour->services()->sync($tourService);
    }

    private function updateTour($tour, $request)
    {
        $payload = $request->only($this->payload());
        $payload['price'] = convert_price($payload['price']);
        return $this->postRepository->update($tour->id, $payload);
    }


    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'description',
            'image',
            'slug',
            'content',
            'publish',
            'user_id'
        ];
    }

}
