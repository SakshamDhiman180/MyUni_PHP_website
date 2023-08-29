<?php

namespace App\Http\Requests\Teacher\Invite;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'invite' => 'required|exists:invite_teachers,token',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'invite.exists' => 'Registration link is invalid or expired'
        ];
    }
}
