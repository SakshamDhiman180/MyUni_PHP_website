<?php

namespace App\Http\Requests\Admin\entranceExam;

use Illuminate\Foundation\Http\FormRequest;

class enteranceRequest extends FormRequest
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
            //
            'admission_year' => 'required',
            'name' => 'required',
            'description' => 'required',
            'code' => 'required',
            'course_id'=>'required',
            'exam_date'=>'required',
            'registration_start_date'=>'required',
            'reg_last_date'=>'required',
            'fee'=>'required',
            'result_date' =>'required',
        ];      
    }
}
