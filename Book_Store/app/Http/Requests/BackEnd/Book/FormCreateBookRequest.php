<?php

namespace App\Http\Requests\BackEnd\Book;

use Illuminate\Foundation\Http\FormRequest;

class FormCreateBookRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'content' => 'max:3000',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publication_date' => 'date',
        ];
    }
}
