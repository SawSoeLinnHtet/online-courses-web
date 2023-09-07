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

            Storage::put($path . $file_name, file_get_contents($file));

            return $file_name;
        }
    }
    