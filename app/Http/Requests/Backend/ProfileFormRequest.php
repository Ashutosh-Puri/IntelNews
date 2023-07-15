<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'username'=>['nullable','string','max:255'],
            'email'=>['required','email','unique:users,email,'.Auth::user()->id.',id'],
            'photo'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','max:2024'],
            'phone'=>['nullable','numeric','digits:10'],
        ];
    }
}
