<?php

namespace App\Services;

use App\Services\Interfaces\TourServiceInterface;
use App\Repositories\Interfaces\TourRepositoryInterface as TourRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class TourService
 * @package App\Services
 */
class TourService extends BaseService implements TourServiceInterface
{
    protected $tourRepository;


    public function __construct(
        TourRepository $tourRepository
    ) {
        $this->tourRepository = $tourRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;

        $users = $this->tourRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/tour/index'],
        );

        return $users;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $tour = $this->createTour($request);
            if ($tour->id > 0) {
                $this->createTourDate($tour, $request);
            }
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

            $tour = $this->tourRepository->findById($id);
            if ($this->updateTour($tour, $request)) {
                $tour->tour_dates()->each(function ($variant) {
                    $variant->delete();
                });
                if ($request->input('time')) {
                    $this->createTourDate($tour, $request);
                }
            }
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
            $tour = $this->tourRepository->delete($id);

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
        $tour = $this->tourRepository->create($payload);
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


    private function updateTour($tour, $request)
    {
        $payload = $request->only($this->payload());
        $payload['price'] = convert_price($payload['price']);
        return $this->tourRepository->update($tour->id, $payload);
    }


    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'description',
            'image',
            'slug',
            'destination_id',
            'price',
            'category_id',
            'album',
            'link',
            'publish',
            'service',
            'code'
        ];
    }

    private function payload()
    {
        return [
            'name',
            'description',
            'image',
            'slug',
            'destination_id',
            'price',
            'category_id',
            'album',
            'link',
            'publish',
            'service',
            'code'
        ];
    }

}
