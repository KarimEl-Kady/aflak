<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id" =>$this->id,
            "name" => $this->name ?? "",
            "phone" => $this->phone ?? "",
            "email" => $this->email ?? "",
            "company_name"=> $this->company_name ??"",
            "company_address"=> $this->company_address ??"",
            "company_website"=> $this->company_website ??"",
            "tax_number" =>(string)$this->tax_number ?? "",
            "email_verify" => intval($this->email_verifiy) ?? "",
            "verfication_code"=> (string)$this->verfication_code ?? "",
            "commercial_register_number" =>(string)$this->commercial_register_number ?? "",

            "image" => $this->image_link ?? "",
            "contract_image" => $this->signature_image_link ?? "",
            "upgrade_status" => intval($this->status) ?? "",
            "wallet_password" => $this->wallet_password ? true : false,

            "api_token" => $this->api_token ?? "",
            // "device_token" => $this->user_device->device_token ?? "",

        ];
    }
}

class ImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" =>$this->id,
            "image" => $this->image_link ?? "",
        ];
    }
}
