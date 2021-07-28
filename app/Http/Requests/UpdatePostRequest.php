<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdatePostRequest extends FormRequest
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

                $userid = FormRequest::input('userid');
                return [
                    'username' => "required|min:3|unique:users,username,$userid|regex:/(^([a-zA-Z]+)(\d+)?$)/u",
                    'email' => "required|email",
                    'password' => "sometimes",
                    'role' => "required",
                    'userid'=>"required",
                    ];


        }

}
