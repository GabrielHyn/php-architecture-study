<?php

namespace App\Http\Requests;

use App\Enums\PaymentStatus;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
