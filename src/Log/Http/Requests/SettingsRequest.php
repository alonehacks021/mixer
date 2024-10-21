<?php

namespace Nahad\Foundation\Log\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;

class SettingsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'is_active_log' => 'nullable|boolean',
            'is_active_exception_alert_log' => 'nullable|boolean',
            'log_alert_users' => 'nullable|array|exists:users,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::add('بروزرسانی تنظیمات انجام نشد', Alert::DANGER);
        parent::failedValidation($validator);
    }
}
