<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validators = [];

        foreach (LaravelLocalization::getSupportedLocales() as
        $localeCode => $properties) {
             $validators['address-' . $localeCode] = ['sometimes'];
             $validators['footer_text-' . $localeCode] = ['sometimes'];
         }
         $validators['phone'] = ['sometimes'];
         $validators['email'] = ['sometimes'];
         $validators['twitter'] = ['sometimes'];
         $validators['facebook'] = ['sometimes'];
         $validators['linkedin'] = ['sometimes'];
         $validators['instagram'] = ['sometimes'];
         $validators['youtube'] = ['sometimes'];
         $validators['lat'] = ['sometimes','numeric'];
         $validators['lon'] = ['sometimes','numeric'];
         $validators['logo'] = ['sometimes'];


        return  $validators;
    }
}
