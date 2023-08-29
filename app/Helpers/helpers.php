<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Services\Configuration\ConfigurationService;

if (!function_exists('isActiveClass')) {
    function isActiveClass($current, $page)
    {
        return ($current == $page) ? ' active' : '';
    }
}

if (!function_exists('adminAuth')) {
    function adminAuth()
    {
        return Auth::guard('admin');
    }
}

if (!function_exists('parentAuth')) {
    function parentAuth()
    {
        return Auth::guard('parents');
    }
}

if (!function_exists('teacherAuth')) {
    function teacherAuth()
    {
        return Auth::guard('teachers');
    }
}

if (!function_exists('convert_attr_name')) {
    function convert_attr_name($name, $replace = '.')
    {
        $name = str_replace('][', $replace, $name);
        $name = str_replace('[', $replace, $name);
        $name = str_replace(']', '', $name);
        return $name;
    }
}

if (!function_exists('encode_arr')) {
    function encode_arr(array $arr): string
    {
        return base64_encode(json_encode($arr));
    }
}

if (!function_exists('decode_to_arr')) {
    function decode_to_arr(string $encoded_str): array
    {
        $decoded = json_decode(base64_decode($encoded_str), true);
        return is_array($decoded) ? $decoded : [];
    }
}

if (!function_exists('rand_string')) {
    function rand_string($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }
}

if (!function_exists('class_to_snake_case')) {
    function class_to_snake_case($class)
    {
        return Str::snake(class_basename($class));
    }
}
