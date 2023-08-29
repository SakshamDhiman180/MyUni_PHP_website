<?php

namespace App\Http\Requests\Parent\Donate;

use Illuminate\Foundation\Http\FormRequest;

class DonateToClassRequest extends FormRequest
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
            'amount' => 'required',
            'appreciation_note' => 'required'
        ];
    }
}
