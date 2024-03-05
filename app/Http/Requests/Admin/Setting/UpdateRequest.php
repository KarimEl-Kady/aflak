<?php

namespace App\Http\Requests\Admin\Setting;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'points' => 'sometimes',
            'post_points' => 'sometimes',
            'value_of_upgrate' => 'sometimes',
            "facebook" => 'sometimes',
            "twitter" => 'sometimes',
            "youtube" => 'sometimes',
            "instagram" => 'sometimes',
            "whatsapp" => 'sometimes',
            "tiktok" => 'sometimes',
            "phone" => 'sometimes',
        ];
    }
}
