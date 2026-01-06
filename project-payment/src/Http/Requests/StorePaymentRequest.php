<?php

namespace App\Http\Requests;

class StorePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payment_type' => 'required',
            'amount' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
