<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantUpdateRequest extends FormRequest
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
            //
            'fullname' => 'string|max:255',
            'email' => 'email|max:255|unique:users,email,' , // Ensure email uniqueness except for the current merchant
            'phone' => 'string|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'fullname' => __('Full Name'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            // Add custom attributes for other fields as needed
        ];
    }
}
