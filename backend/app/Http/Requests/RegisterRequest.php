<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use App\Rules\EmailOrContact;

class AppRegisterRequest extends BaseRequest
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
            'first_name' => 'required|string|min:3|max:255||regex:/^[a-zA-Z\s]+$/',
            'family_name' => 'required|string|min:3|max:255||regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_no' => 'required|phone:AUTO,US|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
