<?php

namespace App\Http\Requests\Admin\Step;

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
        $rules = [];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["title-$localeCode"] = "required";
        }

        $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';


        return $rules;
    }
}
