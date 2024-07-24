<?php
use Carbon\Carbon;

if (!function_exists('convert_price')) {
    function convert_price(string $price = '')
    {
        return str_replace('.', '', $price);
    }
}


if (!function_exists('convert_date')) {
    function convert_date(string $date = '')
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}

