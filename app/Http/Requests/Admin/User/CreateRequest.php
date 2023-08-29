<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required_with:password|same:password',
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
            'contact_no' => 'contact number',
        ];
    }
}
