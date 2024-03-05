<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferAcceptedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id ?? "",
            "hotel_id"=>intval($this->hotel_id),
            "hotel_name"=>$this->hotel_name ?? "",
            "hotel_address"=>$this->hotel_address ?? "",
            "company_name"=>$this->company_name ?? '',
            "rooms"=>RoomResource::collection($this->rooms) ?? "",
            "remaining_time"=>doubleval($this->remaining_time),
            "checkin"=>$this->checkin ?? "",
            "checkout"=>$this->checkout ?? "",
            "offer_situation"=>(string)$this->offer_sit ?? "",

            "offers"=>OferResource::collection($this->offers)->first() ?? "",

        ];
    }
}

class RoomResource extends JsonResource
{public function toArray(Request $request): array{
    return[
        "room_name" => $this->room_name,
        "room_count" => $this->room_count,
        "room_id" => $this->room_id,
    ];
}
}

class OferResource extends JsonResource
{public function toArray(Request $request): array{
    return[
        "request_id"=>intval($this->request_id) ,
            "offer_id"=>$this->id ?? "",
            "company_name"=>$this->company_name ?? "",
            "price"=> ($this->price) ?? "",
            "currency"=>$this->currency ??"",
            "expired_at"=>date($this->expired_at)  ,
            "remain_time"=>$this->remain_time??"",
            "describtion"=>$this->describtion ?? "",
            "offer_sit" => $this->request->offer_sit ?? "",
            "services" => $this->services->pluck('title')->toArray() ?? [],
            "assets" => $this->assets->pluck('asset_link')->toArray() ?? [],
    ];
}
}


