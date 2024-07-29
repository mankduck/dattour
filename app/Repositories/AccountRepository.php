<?php

namespace App\Repositories;

use App\Models\Account;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class GuideService
 * @package App\Services
 */
class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    protected $model;

    public function __construct(
        Account $model
    ) {
        $this->model = $model;
    }
}
