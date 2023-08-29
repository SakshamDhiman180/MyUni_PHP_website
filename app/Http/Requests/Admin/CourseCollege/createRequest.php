<?php

namespace App\Http\Requests\Admin\CourseCollege;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'college_id' => 'required',
            'course_id' => 'required',
            'code' => 'required|unique:college_courses',
            'fee' => 'required',
        ];
    }
}
