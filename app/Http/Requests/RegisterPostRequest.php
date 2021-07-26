<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
            'password'=>"required|regex:/^(?=.*\d)(?=.*[a-zA-Z]).{4,8}$/",
            'role'=>'required'
        ];
    }
}
