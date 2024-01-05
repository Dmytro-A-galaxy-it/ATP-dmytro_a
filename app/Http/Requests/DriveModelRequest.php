<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class DriveModelRequest extends FormRequest
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
            // 'name' => 'required|min:5|max:255'
            'birthday' => ['required','date', function($attribute, $value, $fail) {
                $date1 = Carbon::now();
                $date2 = Carbon::createFromFormat('Y-m-d', $value);
                if($date1->diffInYears($date2) > 65) {
                    $fail('The driver is more than 65 years old.');
                }
                if($date1->diffInYears($date2) < 18) {
                    $fail('You are under 18 years old');
                }   
            }],

            'name' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
            'salary' => ['required','numeric: 2.00']
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
            'name.required' => 'You gotta give it a name, man.',
            'name.min' => 'You came up short. Try more than 3 characters.',
            'surname.required' => 'You gotta give it a surname, man.',
            'surname.min' => 'You came up short. Try more than 3 characters.',
            'salary.required' => 'Enter the correct field Salary',
            'salary.decimal' => 'input format is not correct. Try is correct 2.00'
        ];
    }
}
