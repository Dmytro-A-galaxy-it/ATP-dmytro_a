<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|min:4',
            'surname' => 'required|max:50|min:4',
            'birthday' => ['required','date', function($attribute, $value, $fail) {
                $date1 = Carbon::now();
                $date2 = Carbon::createFromFormat('Y-m-d', $value);
                if((int)$date1->diffInYears($date2) > 65) {
                    dd($date1->diffInYears($date2));
                    $fail('The driver is more than 65 years old.');
                }                 
                if($date1->diffInYears($date2) < 18) {
                    $fail('You are under 18 years old');
                } 
            }]
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
            'surname.required' => 'You gotta give it a name, man.',
            'surname.min' => 'You came up short. Try more than 3 characters.'
        ];
    }
}
