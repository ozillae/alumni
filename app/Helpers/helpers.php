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
