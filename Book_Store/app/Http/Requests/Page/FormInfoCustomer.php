<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class FormInfoCustomer extends FormRequest
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
            'name' => 'required|max:50',
            'phone' => 'required|min:10|numeric',
            'address' => 'required|max:255',
            'payment_id' => 'required',
            'note' => 'max:255'
        ];
    }
}
