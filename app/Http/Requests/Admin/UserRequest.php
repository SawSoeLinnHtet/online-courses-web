<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($this->method() == 'PATCH') {
            $id = $request->route('user')->id;
            return [
                'name' => 'required|regex:/^[a-zA-Z ]*$/',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => ['unique:users,phone,' . $id]
            ];
        } else {
            return [
                'name' => 'required|regex:/^[a-zA-Z ]*$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|between:8,20|string',
                'phone' => 'unique:users,phone'
            ];
        }
    }
}
