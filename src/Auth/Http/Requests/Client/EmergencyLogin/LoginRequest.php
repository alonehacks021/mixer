<?php

namespace Nahad\Foundation\Auth\Http\Requests\Client\EmergencyLogin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Nahad\Foundation\Auth\Rules\NationalCodeRule;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => ['required', new NationalCodeRule()],
            'mobile' => 'required|numeric|starts_with:09|digits:11',
            'captcha' => 'required|captcha',
        ];
    }
}
