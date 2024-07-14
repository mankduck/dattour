<?php
return [
    'module' => [
        [
            'title' => 'QL Tài Khoản',
            'icon' => 'fa fa-user',
            'name' => ['user'],
            'subModule' => [
                [
                    'title' => 'QL Khách Hàng',
                    'route' => 'user/customer/index'
                ],
                [
                    'title' => 'QL Hướng Dẫn Viên',
                    'route' => 'user/guide/index'
                ]
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
