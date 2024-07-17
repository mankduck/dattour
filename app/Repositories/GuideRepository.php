<?php

namespace App\Repositories;

use App\Models\Guide;
use App\Repositories\Interfaces\GuideRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class GuideService
 * @package App\Services
 */
class GuideRepository extends BaseRepository implements GuideRepositoryInterface
{
    protected $model;

    public function __construct(
        Guide $model
    )
    {
        $this->model = $model;
    }
}
