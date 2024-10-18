<?php

namespace Nahad\Foundation\Dashboard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Nahad\Foundation\Dashboard\Support\Alert;
use Illuminate\Validation\Rule;

class BookmarkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => [Rule::requiredIf(function() {
                return $this->get('type') == 'remove';
            })],
            'type' => 'required|in:add,remove',
            'title' => ['string', 'max:255', Rule::requiredIf(function() {
                return $this->get('type') == 'add';
            })],
            'url' => 'required|string|max:2048',
        ];
    }
}
