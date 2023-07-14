<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BannerFormRequest extends FormRequest
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
            'home_one'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'home_two'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'home_three'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'home_four'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'news_category_one'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'news_details_one'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
        ];
    }
}
