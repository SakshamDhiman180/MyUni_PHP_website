<?php

namespace App\Http\Requests\Parent\Donate;

use Illuminate\Foundation\Http\FormRequest;

class DonateToTeacherRequest extends FormRequest
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
            'giftcard_merchant_id' => 'required',
            'giftcard_id' => 'required',
            'appreciation_note' => 'required'
        ];
    }
}
