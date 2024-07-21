<?php
return [
    'module' => [

        [
            'title' => 'QL Khách Hàng',
            'icon' => 'fa fa-user',
            'name' => ['user'],
            'route' => 'admin/user/index',
        ],
        [
            'title' => 'QL Hướng Dẫn Viên',
            'icon' => 'fa fa-address-card',
            'name' => ['guide'],
            'route' => 'admin/guide/index',
        ],
        [
            'title' => 'QL Tours',
            'icon' => 'fa fa-list',
            'name' => ['tour', 'tour-category', 'destination', 'tour-select'],
            'subModule' => [
                [
                    'title' => 'Địa Danh',
                    'route' => 'admin/destination/index'
                ],
                [
                    'title' => 'QL Loại Tour',
                    'route' => 'admin/tour-category/index'
                ],
                [
                    'title' => 'QL Tours Có Sẵn',
                    'route' => 'admin/tour/index'
                ],
                [
                    'title' => 'QL Tours Tự Chọn',
                    'route' => 'admin/tour-select/index'
                ],

            ]
        ],
        [
            'title' => 'QL Service',
            'icon' => 'fa fa-service',
            'name' => ['service'],
            'route' => 'admin/service/index'
        ],
        [
            'title' => 'QL Đặt Tour',
            'icon' => 'fa fa-service',
            'name' => ['tour-detail'],
            'route' => 'admin/tour-detail/index'
        ],
        [
            'title' => 'QL Khuyến Mãi',
            'icon' => 'fa fa-file',
            'name' => ['generate'],
            'subModule' => [
                [
                    'title' => 'QL Vouchers',
                    'route' => 'voucher/index'
                ],
                [
                    'title' => 'QL KM Vip',
                    'route' => 'vip/index'
                ],
            ]
        ],
        [
            'title' => 'QL Resort',
            'icon' => 'fa fa-user',
            'name' => ['resort'],
            'route' => 'admin/resort/index'
        ],
        [
            'title' => 'QL Bài Viết',
            'icon' => 'fa fa-blog',
            'name' => ['post'],
            'route' => 'admin/post/index'
        ],
        [
            'title' => 'Phản Hồi Của KH',
            'icon' => 'fa fa-user',
            'name' => ['feedback'],
            'route' => 'admin/feedback/index'
        ],
        [
            'title' => 'Thống Kê',
            'icon' => 'fa fa-clipboard',
            'name' => ['statistical'],
            'subModule' => [
                [
                    'title' => 'TK Số Lượng Đặt Tour',
                    'route' => 'admin/customer/index'
                ],
                [
                    'title' => 'TK Số Lượng Truy Cập',
                    'route' => 'admin/guide/index'
                ],
                [
                    'title' => 'TK Doanh Thu',
                    'route' => 'admin/customer/index'
                ],
                [
                    'title' => 'TK Phản Hồi KH',
                    'route' => 'admin/customer/index'
                ],
                [
                    'title' => 'Vip Member',
                    'route' => 'admin/customer/index'
                ],
            ]
        ],
        [
            'title' => 'Cấu Hình Chung',
            'icon' => 'fa fa-file',
            'name' => ['system'],
            'subModule' => [
                [
                    'title' => 'Cấu Hình Hệ Thống',
                    'route' => 'admin/system/index'
                ],
            ]
        ]
    ],
];
