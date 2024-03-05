<?php

namespace App\Models\PaymentWay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentWay extends Model
{
    use HasFactory;
    protected $table = 'payment_ways';
    protected $guarded = [];
    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }

}

