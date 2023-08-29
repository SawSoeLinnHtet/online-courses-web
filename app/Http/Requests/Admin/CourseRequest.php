<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseRequest extends FormRequest
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
        return [
            'title' => 'required',
            'instructor_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cover_photo' => 'file|mimes:png,jpg,jpeg|nullable|max:100000',
            'image' => 'file|mimes:png,jpg,jpeg|nullable|max:100000',
            'summary' => 'min:20'
        ];
    }
}
