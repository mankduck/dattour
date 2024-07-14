<?php

namespace App\Repositories;

use App\Models\TourCategory;
use App\Repositories\Interfaces\TourCategoryRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class TourCategoryRepository extends BaseRepository implements TourCategoryRepositoryInterface
{
    protected $model;

    public function __construct(
        TourCategory $model
    ) {
        $this->model = $model;
    }

}
