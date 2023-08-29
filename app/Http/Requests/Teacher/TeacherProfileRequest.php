<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        switch ($this->input('step')) {
            case 1:
                $rules = [
                    'profile_image' => 'nullable|mimes:jpg,jpeg,png',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'dob' => 'required|date| before_or_equal:' . date('Y-m-d'),
                    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'street' => 'required|string|max:255',
                    'country_id' => 'required',
                    'state_id' => 'required',
                    'city_id' => 'nullable',
                    'zip_code' => 'required|numeric|min:6',
                ];
                break;
            case 2:
                $rules = [
                    'school_id' => 'required',
                    'grade' => ['required', 'array'],
                    'teaching_experience' => 'required|integer|min:0',
                    'love_about_teaching' => 'nullable|string|max:1000',
                    'bless_teacher_moment' => 'nullable|string|max:1000',
                    'teaching_philosphy' => 'nullable|string|max:1000',
                    'like_to_instill_my_student' => 'nullable|string|max:1000',
                    'stories' => 'nullable|string|max:1000',
                    'hobbies' => 'nullable|string|max:1000',
                ];
                break;
            case 3:
                $rules = [
                    'images.*' => 'nullable|image|mimes:png,jpg,jpeg|max:8192',
                ];
                break;
        }

        return $rules;
    }

    /**
     * Attributes
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'country_id' => 'country',
            'state_id' => 'state',
            'images.*' => 'image'
        ];
    }
}
