<?php

namespace App\Http\Requests\Parent\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        // $model = $this->route('example'); //or whatever it is named in the route

        return [
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|numeric|digits:10',
            'street' => 'max:255|nullable',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'nullable',
            'zip_code' => 'required|numeric|min:5'
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
            'country_id' => 'country',
            'state_id' => 'state',
        ];
    }
}
