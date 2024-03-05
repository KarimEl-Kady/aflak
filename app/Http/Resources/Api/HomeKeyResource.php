<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeKeyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "id" => $this->id,
            "points" => $this->points ?? "",
            "post_points" => $this->post_points ?? "",
            "value_of_upgrate" => intval($this->value_of_upgrate),

        ];
    }
}
