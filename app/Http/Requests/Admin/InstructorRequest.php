<?php

namespace App\Http\Requests\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
            $id = $request->route('instructor')->id;
            
            return [
                'name' => 'required',
                'email' => 'required|email|unique:instructors,email,' . $id,
                'phone' => ['unique:instructors,phone,' . $id],
                'dob' => 'required', 
                'profile' => 'nullable|file|mimes:png,jpg,jpeg|nullable|max:100000',
                'bio' => 'nullable|min:20',
                'address' => 'nullable|min:20'
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:instructors,email',
                'password' => 'required|confirmed|between:8,20|string',
                'phone' => 'unique:instructors,phone',
                'dob' => 'required',
                'profile' => 'nullable|file|mimes:png,jpg,jpeg|nullable|max:100000',
                'bio' => 'nullable|min:20',
                'address' => 'nullable|min:20'
            ];
        }
    }
}
