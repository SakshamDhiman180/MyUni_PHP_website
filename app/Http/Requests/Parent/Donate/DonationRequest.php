<?php

namespace App\Http\Requests\Parent\Donate;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'teacher_id' => 'required|exists:teachers,id',
            'gift_to' => 'required|in:1,2',
            'giftcard_merchant_id' => 'required_if:gift_to,1',
            'giftcard_id' => 'required_if:gift_to,1',
            'amount' => 'required_if:gift_to,0',
            'appreciation_note' => 'required'
        ];
    }
}
