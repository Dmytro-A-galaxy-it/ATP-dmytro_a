<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusModelRequest extends FormRequest
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
            'deg_namber' => 'required|string|min:8|max:8',
            'brand_id' => 'integer|exists:car_brands,id',
            'drive_id' => 'integer|exists:drive_models,id',
            // 'name' => 'required|min:5|max:255'
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
            'deg_namber.required' => 'You gotta give it a number, bus.',
            'deg_namber.min' => 'You came up short. Try more than 8 characters',
            'deg_namber.max' => 'You have entered too many characters. Try to enter less than 8 characters.'
        ];
    }
}
