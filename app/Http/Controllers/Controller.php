<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAuthUser($guard_name = 'admin')
    {
        return auth()->guard($guard_name)->user();
    }

    public function checkRolePermission($permission, $guard_name = 'admin')
    {
        abort_if(!$this->getAuthUser($guard_name)->can($permission), 403);
    }
}
