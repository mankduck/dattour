<?php

namespace App\Services;

use App\Services\BaseService;
use App\Services\Interfaces\RoleServiceInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface as RoleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class RoleService
 * @package App\Services
 */
class RoleService extends BaseService implements RoleServiceInterface
{
    protected $roleRepository;


    public function __construct(
        RoleRepository $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        // $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $roles = $this->roleRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/role/index'],
        );


        return $roles;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);
            $role = $this->roleRepository->create($payload);
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
            $role = $this->roleRepository->update($id, $payload);
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
            $role = $this->roleRepository->delete($id);

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
    public function setPermission($request)
    {
        DB::beginTransaction();
        try {

            $permissions = $request->input('permission');
            if (count($permissions)) {
                foreach ($permissions as $key => $val) {
                    $role = $this->roleRepository->findById($key);
                    $role->permissions()->detach();
                    $role->permissions()->sync($val);

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
        //Mục đích là đưa được dữ liệu vào bên trong bảng user_catalogue_permission
    }


    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'publish',
            'description'
        ];
    }


}
