<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostRequest extends FormRequest
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
        $type=FormRequest::input('operation');
        switch ($type) {
            case 'update':
                $userid = FormRequest::input('userid');
                return ['username' => "required|min:3|unique:users,username,$userid|regex:/(^([a-zA-Z]+)(\d+)?$)/u",
                    'email' => "required|email",
                    'password' => "nullable|min:3",
                    'role' => "required",
                    ];

            case 'create':
                return ['username' => "required|min:3|unique:users,username|regex:/(^([a-zA-Z]+)(\d+)?$)/u",
                    'email' => "required|email",
                    'password' => "required|min:3",
                    'role' => "required",
                    ];

        }
    }
}
