<?php

return [
    'menu' => [
        'home' => 'Trang chủ',
        'about' => 'Về chúng tôi',
        'destination' => 'Điểm đến',
        'tour' => 'Xem Tour',
        'tours' => 'Danh sách tour',
        'tour_select' => 'Tour tự chọn',
        'post' => 'Tin tức',
        'contact' => 'Liên hệ',
        'login' => 'Đăng nhập',
        'register' => 'Đăng kí',
        'order_tracking' => 'Lịch sử đặt tour',
        'logout' => 'Đăng xuất'
    ],
    [
        'title' => 'Trang chủ',
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
];