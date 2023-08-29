<?php

namespace App\Http\Requests\Example;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required',
            'mobile' => 'required|unique:examples,mobile',
            'description' => 'required',
            'type' => 'nullable|in:1,2',
            'image' => 'nullable',
            'status' => 'in:0,1'
        ];
    }
}
