<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentWayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id" => $this->id,
            "title" => $this->title ??"",
            "sub_title" => $this->sub_title ??"",
            "type" => intval($this->type) ?? "",
            "image" => $this->image_link ?? "",
        ];
    }
}
