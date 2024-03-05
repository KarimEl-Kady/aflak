<?php

namespace App\Models\PaymentWay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;
    protected $table = 'payment_orders';
    protected $guarded = [];

    protected $appends  = ["order_receipt_image_link"];
    public function getOrderReceiptImageLinkAttribute()
    {
        return $this->order_receipt_image ? asset($this->order_receipt_image) : '';
    }
}
