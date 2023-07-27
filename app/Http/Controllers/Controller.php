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

    public function getAuthUser(string $guard = 'web')
    {
        return Auth::guard($guard)->user();
    }

    public function checkRolePermission(string $permission, string $guard = 'web')
    {
        abort_if(!$this->getAuthUser($guard)->can($permission), 403);
    }
}
