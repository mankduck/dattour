<?php

namespace App\Repositories;

use App\Models\BookingDetail;
use App\Models\TourDetail;
use App\Repositories\Interfaces\BookingDetailRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class BookingDetailRepository extends BaseRepository implements BookingDetailRepositoryInterface
{
    protected $model;

    public function __construct(
        BookingDetail $model
    ) {
        $this->model = $model;
    }

}
