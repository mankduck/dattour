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


    public function paginationAccount(
        array $column = ['*'],      //Chỉ định các cột cần chọn từ cơ sở dữ liệu
        array $condition = [],      //Điều kiện để lọc kết quả truy vấn
        $publish = '',
        $keyword = '',
        int $perPage = 9,           //Số lượng mục hiển thị trên mỗi trang
        array $extend = [],         //Các tham số bổ sung như: Đường dẫn cho các liên kết phân trang...
        array $orderBy = ['id', 'DESC'],        //Chỉ định cột và thứ tự để sắp xếp kết quả
        array $join = [],           //Điều kiện kết nối các bảng liên quan
        array $relations = [],      //Tải trước các mối quan hệ
        array $rawQuery = []        //Sử dụng cho cây phân cấp (Bình luận)

    ) {
        $query = $this->model->select($column);         //khởi tạo truy vấn với các cột được chỉ định
        return $query
            ->manyKeyword($condition ?? null, $keyword ?? null)        //Lọc kết quả dựa trên từ khóa nếu có
            ->publish($publish ?? null)
            ->relationCount($relations ?? null)
            ->CustomWhere($condition['where'] ?? null)
            ->customWhereRaw($rawQuery['whereRaw'] ?? null)
            ->customJoin($join ?? null)
            ->customGroupBy($extend['groupBy'] ?? null)         //Nhóm kết quả nếu có chỉ định
            ->customOrderBy($orderBy ?? null)           //Sắp xếp kết quả dựa trên cột và thứ tự chỉ định
            ->paginate($perPage)            //Phân trang kết quả
            ->withQueryString()->withPath(env('APP_URL') . $extend['path']);
        //tạo ra URL đầy đủ cho các liên kết phân trang, kết hợp URL gốc của ứng dụng (APP_URL từ tệp .env) với đường dẫn được chỉ định trong $extend['path'].
    }
}
