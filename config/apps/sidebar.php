<?php
return [
    'module' => [
        // [
        //     'title' => 'QL Tài Khoản',
        //     'icon' => 'fa fa-user',
        //     'name' => ['customer', 'guide'],
        //     'subModule' => [
        //         [
        //             'title' => 'QL Khách Hàng',
        //             'route' => 'admin/customer/index'
        //         ],
        //         [
        //             'title' => 'QL Hướng Dẫn Viên',
        //             'route' => 'admin/guide/index'
        //         ]
        //     ]
        // ],
        [
            'title' => 'QL Khách Hàng',
            'icon' => 'fa fa-user',
            'name' => ['user'],
            'route' => 'admin/user/index',
        ],
        [
            'title' => 'QL Hướng Dẫn Viên',
            'icon' => 'fa fa-user',
            'name' => ['guide'],
            'route' => 'admin/guide/index',
        ],
        [
            'title' => 'QL Tours',
            'icon' => 'fa fa-user',
            'name' => ['tour', 'tour-category'],
            'subModule' => [
                [
                    'title' => 'QL Tours',
                    'route' => 'admin/tour/index'
                ],
                [
                    'title' => 'QL Loại Tour',
                    'route' => 'admin/tour-category/index'
                ]
            ]
        ],
        [
            'title' => 'QL Service',
            'icon' => 'fa fa-service',
            'name' => ['tour', 'service'],
            'subModule' => [
                [
                    'title' => 'QL Service',
                    'route' => 'admin/service/index'
                ],
            ]
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
