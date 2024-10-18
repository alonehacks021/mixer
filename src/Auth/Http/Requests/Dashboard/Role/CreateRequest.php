<?php

namespace Nahad\Foundation\Auth\Http\Requests\Dashboard\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:roles,name',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('افزودن نقش انجام نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
