<?php

namespace App\Http\Requests\Admin\Course_cate;

use Illuminate\Foundation\Http\FormRequest;

class Course_category extends FormRequest
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
            'code' => 'required|unique:course_category',
            'name' => 'required|unique:course_category',
        ];
    }
}
