<?php

namespace App\Http\Requests;

use App\Helper\JsonResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        $errors = [];
        foreach (json_decode($validator->errors()) as $key => $error) {
            $errors[$key] = $error[0];
        }
        throw new HttpResponseException(statusResponseError($errors,translateMessage(__('messages.required_all')),400));
    }
}
