<?php

    use Illuminate\Support\Facades\Storage;

    if (!function_exists('checkPermission')) {
        function checkPermission($permission, $guard = 'admin')
        {
            return auth()->guard($guard)->user()->can($permission);
        }
    }

    if (!function_exists('uploadFile')) {
        function uploadFile($path, $file) 
        {
            $file_name = uniqid() . '_' . date('Y-m-d-H-i-s') . '_' . $file->getClientOriginalName();

            $file->move($path, $file_name);

            return $file_name;
        }
    }
    