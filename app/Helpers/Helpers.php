<?php

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('custom_date')) {
    function custom_date($date, $date_format)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
    }
}

if (!function_exists('auction_status')) {
    function auction_status($status)
    {
        if ($status == 'opened') {
            return 'Dibuka';
        } else {
            return 'Ditutup';
        }
    }
}

if (!function_exists('officer_level')) {
    function officer_level($level)
    {
        if ($level == 1) {
            return 'Administrator';
        } elseif ($level == 2) {
            return 'Petugas';
        } else {
            return 'Masyarakat';
        }
    }
}

if (!function_exists('translation_level')) {
    function translation_level($level)
    {
        if ($level == 'Administrator') {
            return 'Administrator';
        } elseif ($level == 'Officer') {
            return 'Petugas';
        } else {
            return 'Masyarakat';
        }
    }
}
