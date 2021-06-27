<?php

namespace App\Http\Requests\BackEnd\Category;

use Illuminate\Foundation\Http\FormRequest;

class FormCreateCategoryRequest extends FormRequest
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
            'name' => 'unique:categories|min:3',
        ];
    }
}