<?php

namespace Nahad\Foundation\Auth\Http\Requests\Client\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;
use Nahad\Foundation\Auth\Models\User;

class AccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'gender' => ['required', Rule::in(User::getGenders())],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('بروزرسانی حساب کاربری انجام نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
