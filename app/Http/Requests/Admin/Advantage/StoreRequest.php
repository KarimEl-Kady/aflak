<?php

namespace App\Http\Requests\Admin\Advantage;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

        $validators['image'] = ['required'];
        foreach (LaravelLocalization::getSupportedLocales() as
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required'];
             $validators['text-' . $localeCode] = ['required'];
         }

        return  $validators;
    }
}