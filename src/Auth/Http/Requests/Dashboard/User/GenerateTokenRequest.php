<?php

namespace Nahad\Foundation\Auth\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;

class GenerateTokenRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('ایجاد توکن جدید انجام نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
