<?php

namespace App\Http\Requests\Admin\Notifications;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreNotificationRequest extends FormRequest
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


        // $validator += ['title' => 'required'];
        $validators['title'] = ['required', 'string'];
        $validators['text'] = ['nullable', 'string'];

        return $validators;
    }
}
