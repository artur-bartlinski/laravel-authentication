<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'address_line_1' => 'addressLength:{$data["address_line_2"]}|required|string|max:60',
            'address_line_2' => 'addressLength:{$data["address_line_1"]}|nullable|string|max:60',
            'town' => 'required|string',
            'county' => 'nullable|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'from_date' => 'required|date|after_or_equal:dob|before:until_date',
            'until_date' => 'required|date|after:from_date',
        ];
    }
}
