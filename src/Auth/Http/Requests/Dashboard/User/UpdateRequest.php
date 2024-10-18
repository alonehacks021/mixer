<?php

namespace Nahad\Foundation\Auth\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;
use Nahad\Foundation\Auth\Models\User;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            '*' => 'bail',
            'username' => ['nullable', 'alpha_dash', 'max:255', 'unique:users,username,'.$this->user->id, Rule::requiredIf(function() {
                return $this->user->type == User::TYPE_ADMIN;
            })],
            'password' => 'nullable|string|min:8|max:16',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => ['nullable', 'email', Rule::requiredIf(function() {
                return $this->user->type == User::TYPE_ADMIN;
            })],
            'mobile' => ['nullable', 'starts_with:09', 'digits:11', 'unique:users,mobile,'.$this->user->id, Rule::requiredIf(function() {
                return $this->user->type == User::TYPE_ADMIN;
            })],
            'image' => 'nullable|image|max:2048',
            'gender' => ['required', Rule::in(User::getGenders())],
            'status' => ['nullable', Rule::in(User::getStatuses()), Rule::requiredIf(function() {
                return $this->user()->can('changeStatus', $this->user);
            })],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('بروزرسانی کاربر انجام نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
