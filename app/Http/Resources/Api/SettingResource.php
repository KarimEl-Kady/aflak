<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "points" => $this->points ?? "",
            "post_points" => $this->post_points ?? "",
            "value_of_upgrate" => $this->value_of_upgrate ?? "",
            "facebook" => $this->facebook,
            "youtube" => $this->youtube ?? "",
            "twitter" => $this->twitter ?? "",
            "instagram" => $this->instagram ?? "",
            "tiktok" => $this->tiktok ?? "",
            "whatsapp" => $this->whatsapp ?? "",
            "phone" => $this->phone ?? "",
            "description" => $this->description ?? "",
        ];
    }
}
