<?php

namespace App\Http\Requests\Website\Request;

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

        $validators['email'] = 'required|email';
        $validators['name'] = 'required';
        $validators['phone'] = 'required|numeric';
        $validators['load'] = 'required|numeric';
        $validators['fright_type'] = 'required|numeric';





        return $validators;
    }
}
