<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EpisodeRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required',
            'privacy' => 'required',
            'cover' => 'nullable|file|mimes:png,jpg,jpeg',
            'image' => 'nullable|file|mimes:png,jpg,jpeg',
            'video' => 'nullable|file|mimes:mp4|mimetypes:video/mp4',
            'summary' => 'nullable|min:20'
        ];
    }
}
