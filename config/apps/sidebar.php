<?php
return [
    'module' => [
        [
            'title' => 'QL Tài Khoản',
            'icon' => 'fa fa-list',
            'name' => ['account', 'user', 'guide', 'role', 'permission'],
            'subModule' => [
                [
                    'title' => 'QL Tài Khoản',
                    'route' => 'admin/account/index'
                ],
                [
                    'title' => 'QL Thông Tin KH',
                    'route' => 'admin/user/index'
                ],
                [
                    'title' => 'QL Thông Tin HDV',
                    'route' => 'admin/guide/index'
                ],
                [
                    'title' => 'QL Nhóm TK',
                    'route' => 'admin/role/index'
                ],
                [
                    'title' => 'QL Phân Quyền',
                    'route' => 'admin/permission/index'
                ],
            ]
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
            'name' => ['booking'],
            'route' => 'admin/booking/index'
        ],
        [
            'title' => 'QL Hoá Đơn',
            'icon' => 'fa fa-service',
            'name' => ['bill'],
            'route' => 'admin/bill/index'
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
