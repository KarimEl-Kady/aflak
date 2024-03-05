<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PointHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title"=>strval($this->title) ?? '',
            "date"=>strval($this->date_format) ?? "",
            "value"=>strval($this->points) ?? '',
            "type"=>intval($this->type) ?? 0,

        ];
    }
}
