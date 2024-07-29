<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    public function __construct(
        Role $model
    ) {
        $this->model = $model;
    }

}
