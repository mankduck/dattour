<?php

namespace App\Services;

use App\Services\Interfaces\GuideServiceInterface;
use App\Repositories\Interfaces\GuideRepositoryInterface as GuideRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class GuideService
 * @package App\Services
 */
class GuideService extends BaseService implements GuideServiceInterface
{
    protected $guideRepository;

    public function __construct(
        GuideRepository $guideRepository
    ) {
        $this->guideRepository = $guideRepository;
    }

    public function paginate($request)
    {

        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $guides = $this->guideRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/guide/index'],
        );

        return $guides;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            if ($payload['birthday'] != null) {
                $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            }
            // dd($payload);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $guide = $this->guideRepository->create($payload);
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
            if ($payload['birthday'] != null) {
                $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            }
            // dd($payload);
            $guide = $this->guideRepository->update($id, $payload);
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
            $guide = $this->guideRepository->delete($id);

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

    private function convertBirthdayDate($birthday = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    private function paginateSelect()
    {
        return [
            'id',
            'account_id',
            'name',
            'birthday',
            'image',
            'phone',
        ];
    }
}
