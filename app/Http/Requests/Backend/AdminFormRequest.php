<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
            'email'=>['required','email',Rule::unique('users')->ignore($this->id)],
            'password'=>['sometimes','required',Password::defaults()],
            'photo'=>['nullable','image','mimes:png,jpg,jpeg'],
            'phone'=>['nullable','numeric','digits:10'],
            'role'=>['required','string'],
        ];
    }
}
