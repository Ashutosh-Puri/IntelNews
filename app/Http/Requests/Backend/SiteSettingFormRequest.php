<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingFormRequest extends FormRequest
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
            'dev_name'=>['nullable','string',],
            'dev_company'=>['nullable','string',],
            'dev_site'=>['nullable','url',],
            'address'=>['nullable','string',],
            'email'=>['nullable','email',],
            'phone'=>['nullable','numeric',],
            'logo_small'=>['nullable','image','mimes:jpeg,gif,png,jpg,svg','max:2048'],
            'logo_large'=>['nullable','image','mimes:jpeg,gif,png,jpg,svg','max:2048'],
            'favicon'=>['nullable','image','mimes:jpeg,gif,png,jpg,svg,ico','max:2048'],
            'social_icon_1'=>['nullable','string',],
            'social_icon_1_url'=>['nullable','url'],
            'social_icon_2'=>['nullable','string',],
            'social_icon_2_url'=>['nullable','url'],
            'social_icon_3'=>['nullable','string',],
            'social_icon_3_url'=>['nullable','url'],
            'social_icon_4'=>['nullable','string',],
            'social_icon_4_url'=>['nullable','url'],
        ];
    }
}
