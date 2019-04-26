<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryStoreRequest extends FormRequest
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
            'sender_id'=> 'required|integer',
            'recipient_id' => 'required|integer',
            'user_id' => 'required|integer',
            'weight' => 'required|double',
            'distance' => 'required|double',
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
            'sender_id.required' => 'Sender detail is required!',
            'recipient_id.required' => 'Recipient detail is required!',
            'user_id.required' => 'Courier agent is required!',
            'weight.required' => 'Weight is required',
            'distance.required' => 'Distance is required',
        ];
    }
}
