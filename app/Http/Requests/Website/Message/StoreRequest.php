<?php

namespace App\Http\Requests\Website\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $validators = [];

        $validators['name'] = 'required';
        $validators['email'] = ['required', 'email'];
        $validators['subject'] = 'sometimes';
        $validators['message'] = 'required';

        return $validators;
    }
}
