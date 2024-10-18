<?php

namespace Nahad\Foundation\Auth\Http\Requests\Dashboard\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;

class PermissionsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'permissions' => 'nullable|array|exists:permissions,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('تغییرات اعمال نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
