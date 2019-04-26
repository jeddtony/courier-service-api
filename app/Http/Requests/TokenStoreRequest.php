<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'delivery_id'=> 'required|integer',
            'token' => 'required|string',
            'question' => 'required',
            'answer' => 'required',
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
            'delivery_id.required' => 'Delivery details is required!',
            'token.required' => 'Token is required!',
            'question.required' => 'Question is required!',
            'answer.required' => 'Answer is required',
        ];
    }
}
