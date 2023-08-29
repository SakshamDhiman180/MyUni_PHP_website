<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:6',
            'confirm_password' => 'nullable|required_with:password|same:password',
            'status' => 'nullable'
        ];
    }

    /**
     * Attributes
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'role_id' => 'role',
        ];
    }
}
