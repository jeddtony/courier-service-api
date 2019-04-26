<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SenderStoreRequest extends FormRequest
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
            'email'=> 'required|email',
            'name' => 'required|string|max:50',
            'phone_no' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'phone_no.required' => 'Phone number is required!'
        ];
    }
}
