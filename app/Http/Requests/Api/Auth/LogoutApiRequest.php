<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class LogoutApiRequest extends MasterApiRequest
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
            "device_token" => "required|string",
        ];
    }
}
