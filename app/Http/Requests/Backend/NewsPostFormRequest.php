<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsPostFormRequest extends FormRequest
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
            'category_id'=>['required','integer'],
            'user_id'=>['required','integer'],
            'subcategory_id'=>['nullable','integer'],
            'news_title'=>['required','string'], 
            'image'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'news_details'=>['nullable','string'],
            'tags'=>['nullable','string'],
            'breaking_news'=>['nullable','integer'],
            'top_slider'=>['nullable','integer'],
            'first_section_three'=>['nullable','integer'],
            'first_section_nine'=>['nullable','integer'],
        ];
    }
}
