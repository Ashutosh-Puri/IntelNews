<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class RoleInPermissionFormRequest extends FormRequest
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
            'permission'=>['required'],
            // 'permission.*'=>['integer'],

            'role'=>['sometimes','required']
        ];
    }

    public function messages(): array
    {   
        return [
            'permission.required' => 'The Permission Field Is Required.Select At Least One Of This.',
        ];
    }
}
