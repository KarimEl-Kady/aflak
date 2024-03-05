<?php

namespace App\Models\Offer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTranslation extends Model
{
    use HasFactory;
    protected $table = 'offer_translations' ;
    protected $fillable = ['describtion'];
}
