<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => 'required|min:3|max:10'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'brand.required' => 'You gotta give it a name, man.',
            'brand.min' => 'You came up short. Try more than 3 characters.',
            'brand.max' => 'You have entered too many characters. Try to enter less than 10 characters.'
        ];
    }
}
