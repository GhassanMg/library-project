<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone' => ['required_without:email', Rule::unique('users')->ignore($this->user), 'string', 'regex:/(^(\+)*(\d+)$)/u', 'max:255', 'min:6'],
            'address' => 'required|string',
            'image' => 'image|file'
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
