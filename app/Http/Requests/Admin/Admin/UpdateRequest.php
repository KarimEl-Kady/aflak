<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:admins,phone,' . $this->admin,
            'email' => 'required|unique:admins,email,' . $this->admin,
            'password' => 'nullable|min:8',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ];
    }
}
