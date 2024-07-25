<?php

namespace App\Services;

use App\Services\Interfaces\BookingDetailServiceInterface;
use App\Repositories\Interfaces\BookingDetailRepositoryInterface as BookingDetailRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class BookingDetailService
 * @package App\Services
 */
class BookingDetailService extends BaseService implements BookingDetailServiceInterface
{
    protected $bookingDetailRepository;

    public function __construct(
        BookingDetailRepository $bookingDetailRepository
    ) {
        $this->bookingDetailRepository = $bookingDetailRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $users = $this->bookingDetailRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/booking/index'],
        );


        return $users;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {

            $booking = $this->createBookingDetail($request);
            if ($booking->id > 0) {
                $this->createBill($booking, $request);
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

            $payload = $request->only('guide_id', 'status');
            $booking = $this->bookingDetailRepository->update($id, $payload);
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
            $user = $this->bookingDetailRepository->delete($id);

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

    public function createBookingDetail($request)
    {
        $payload = $request->except(['_token', 'send']);
        $payload['tour_date'] = $this->convertDateTime($payload['tour_date']);
        $booking = $this->bookingDetailRepository->create($payload);
        return $booking;
    }


    public function createBill($booking, $request)
    {
        $payload = $request->only($this->payload());
        // dd($payload);
        $bill = $booking->bill()->create($payload);
    }


    public function convertDateTime(string $dateTime = '')
    {
        // Phân tích chuỗi thời gian
        $dateTimeConvert = Carbon::parse($dateTime);
        // Định dạng lại thời gian
        $formattedTime = $dateTimeConvert->format('d-m-Y'); // Định dạng giờ: phút: giây
        return $formattedTime;
    }

    private function paginateSelect()
    {
        return [
            'id',
            'phone',
            'email',
            'address',
            'name',
            'tour_date',
            'adult',
            'children',
            'tour_id',
            'guide_id',
            'total',
            'status'
        ];
    }


    private function payload()
    {
        return [
            'total',
            'total_chil',
            'total_adult',
            'discount',
        ];
    }


}
