<?php

namespace Nahad\Foundation\Auth\Http\Requests\Api\Client\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;

class ExternalLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'national_code' => 'required|string|max:50',
        ];
    }
}
