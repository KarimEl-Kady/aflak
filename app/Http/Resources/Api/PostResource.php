<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "content" => $this->content ?? "",
            "likes_count" => $this->likes->count() ?? 0,
            "comments_count" => $this->comments->count() ?? 0,
            "is_liked" => $this->isLiked(),
            "owner" => new OwnerResource($this->user) ?? "",
        ];
    }
}
