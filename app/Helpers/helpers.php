<?php

if (!function_exists('format_date')) {
    /**
     * Format a given date.
     *
     * @param string $date
     * @param string $format
     * @return string
     */
    function format_date($date, $format = 'Y-m-d') {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('generate_slug')) {
    /**
     * Generate a URL-friendly slug from a string.
     *
     * @param string $string
     * @return string
     */
    function generate_slug($string) {
        return \Illuminate\Support\Str::slug($string);
    }
}

function displayDate($date) {
    return date("d M Y", strtotime($date));
}

function displayDateTime($date) {
    return date("d M Y H:i", strtotime($date));
}

function displayDateTimeDay($date) {
    return date("D, d M Y H:i", strtotime($date));
}

function displayNumber($num, $koma=0) {
    return number_format($num, $koma, ",", " ");
}

function displayPhoneNumber($number){
    return substr($number, 0, 6) . "-" . substr($number, 6, 4) . "-" . substr($number, 10); 
}

function generateCodeUnique($length=10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}