<?php

namespace App\Models\Offer;

use App\Models\Request\Request;
use App\Models\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['describtion',];
    protected $translationForeignKey = 'offer_id';
    protected $table = 'offers';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(OfferService::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(OfferAsset::class);
    }
    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    
}
