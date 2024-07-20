<?php
return [
    'module' => [
        [
            'title' => 'Thống Kê',
            'icon' => 'fa fa-clipboard',
            'name' => ['customer'],
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
            'name' => ['tour', 'tour-category'],
            'subModule' => [
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
                    'route' => 'admin/tour/index'
                ],

            ]
        ],
        [
            'title' => 'QL Service',
            'icon' => 'fa fa-service',
            'name' => ['tour', 'service'],
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
            'name' => ['language', 'generate'],
            'subModule' => [
                [
                    'title' => 'QL Vouchers',
                    'route' => 'system/index'
                ],
                [
                    'title' => 'QL KM Vip',
                    'route' => 'system/index'
                ],
            ]
        ],
        [
            'title' => 'QL Resort',
            'icon' => 'fa fa-user',
            'name' => ['post'],
            'route' => 'admin/post/index'
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
            'name' => ['post'],
            'route' => 'admin/post/index'
        ],
        [
            'title' => 'Cấu Hình Chung',
            'icon' => 'fa fa-file',
            'name' => ['language', 'generate', 'widget'],
            'subModule' => [
                [
                    'title' => 'Cấu Hình Hệ Thống',
                    'route' => 'system/index'
                ],
            ]
        ]
    ],
];
