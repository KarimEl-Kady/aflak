<?php

namespace App\Http\Requests\Admin\PaymentWay;

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
        return [
            //
            'image'=>'mimes:jpeg,jpg,png,gif',
            'title'=>'required',
            'sub_title'=>'required',
            'type'=>'required',
        ];
    }
}
