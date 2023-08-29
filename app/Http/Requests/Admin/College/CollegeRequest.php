<?php

namespace App\Http\Requests\Admin\College;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
            'banner_image'=>'nullable',
            'name' =>'required', 
            'description' => 'nullable',
            'streams' => 'required|array',
            'code' => 'required|unique:colleges',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'contact_number' => 'required',
            'email' => 'required|unique:colleges',
            'principal_name' => 'required',
        ];
    }
}
