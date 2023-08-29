<?php

namespace App\Http\Requests\Parent\Teacher;

use App\Models\InviteTeacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class InviteRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email|unique:parents,email|unique:teachers,email',
            'phone' => 'nullable|numeric|digits:10'
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if (InviteTeacher::where('email', $this->email)->exists()) {
                    $validator->errors()->add(
                        'email',
                        'There exists an invite with this email!'
                    );
                }
            }
        ];
    }
}
