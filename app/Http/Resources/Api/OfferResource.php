<?php

namespace App\Http\Resources\Api;

use App\Models\Request\Request as RequestRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
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

            // "service_describtion"=>$this->service_describtion ?? "",
        ];
        }
}

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' =>$this->title ?? "",
        ];
        }
}

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'asset' =>$this->asset_link ?? "",
        ];
        }
}
