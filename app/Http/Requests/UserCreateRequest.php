<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'first_name' => 'required|min:3|bail',
            'last_name' => 'required|min:3|bail',
            'email' => 'email|required|unique:users|bail',
            'password' => 'required|min:4|bail',
            'password_confirmation' => 'required|min:4|same:password'
        ];
    }
}
