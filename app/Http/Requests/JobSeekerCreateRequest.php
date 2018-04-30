<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSeekerCreateRequest extends FormRequest
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
            'experience' => 'required|bail',
            'skills' => 'required|min:1|bail',
            'designation' => 'required|min:4|bail',
            'expected_salary' => 'required|min:1|bail',
            'currunt_location' => 'required|min:4|bail'
        ];
    }
}
