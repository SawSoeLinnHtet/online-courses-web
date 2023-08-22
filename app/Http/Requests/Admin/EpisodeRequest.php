<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'cover' => 'file|mimes:png,jpg,jpeg',
            'image' => 'file|mimes:png,jpg,jpeg',
            'video' => 'file|mimes:mp4,mov,avi,mpeg-4'
        ];
    }
}
