<?php

namespace App\Http\Requests\Teacher\Redeem;

use Illuminate\Foundation\Http\FormRequest;

class GiftRedeemRequest extends FormRequest
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
            // 'choices-parent' => 'required|exists:parents,id',
            'redeem_for' => 'required|in:1,2',
            'choices-card' => 'required',
            'giftcard_options' => 'required',
            // 'note' => 'required',
        ];
    }
}
