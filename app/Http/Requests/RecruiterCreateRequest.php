<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruiterCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'age' => 'required|max:3|bail',
            'phone' => 'required|min:10|max:10|bail',
            'designation' => 'required|min:2|bail',
            'company_name' => 'required|min:2|bail'
        ];
    }
}
