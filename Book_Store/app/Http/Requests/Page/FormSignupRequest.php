<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class FormSignupRequest extends FormRequest
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
            'name' => 'required|max:30|',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'address' => 'max:100',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
