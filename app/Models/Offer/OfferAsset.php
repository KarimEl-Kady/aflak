<?php

namespace App\Models\Offer;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferAsset extends Model
{
    use HasFactory;
    protected $table = 'offer_assets';
    protected $guarded = [];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    protected $appends  = ["asset_link"];

    public function getAssetLinkAttribute()
    {
        return $this->asset ? asset($this->asset) : '';
    }
}
