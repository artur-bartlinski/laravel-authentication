<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'forename' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'title_id' => 'nullable|integer',
            'gender_id' => 'nullable|integer',
            'dob' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }
}
