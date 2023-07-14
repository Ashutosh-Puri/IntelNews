<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VideoGalleryFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'video_title'=>['required','string','max:100'],
            'video_url'=>['required','url'],
            'video_image'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024']
        ];
    }
}
