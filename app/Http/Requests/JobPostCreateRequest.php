<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostCreateRequest extends FormRequest
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
            'job_title' => 'required|min:4|bail',
            'job_description' => 'required|min:4|bail',
            'company_name' => 'required|min:2|bail',
            'salary' => 'required|bail',
            'skills' => 'required|min:4|bail',
            'address' => 'min:4|bail',
            'country' => 'required|min:4|bail',
            'location' => 'required|min:4|bail'
        ];
    }
}
