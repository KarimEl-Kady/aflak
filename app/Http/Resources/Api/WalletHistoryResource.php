<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => intval($this->id),
            "title"=>strval($this->title) ?? '',
            "value"=>strval($this->balance) ?? '',
            "date"=>strval($this->date_format) ?? "",
            "type"=>intval($this->type) ?? 0,
            "receipt_image"=>$this->receipt_image_link?? "",
            "payment_gateway_link"=>$this->payment_gateway_link?? "",

        ];
    }
}
