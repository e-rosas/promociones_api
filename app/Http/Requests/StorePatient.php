<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest
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
            'name' => 'required|min:6|max:255',
            'birth_date' => 'required|date|after:1900-01-01',
            'phone_number' => 'required|max:255',
            'email' => 'required|email|max:255',
            'insured' => 'required|boolean',
        ];
    }
}
