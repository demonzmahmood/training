<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'username'=>"required|min:3|unique:users,username|regex:/(^([a-zA-Z]+)(\d+)?$)/u",
            'email'=>"required|email",
            'password'=>"required",
            'role'=>"required"
        ];
    }
}
