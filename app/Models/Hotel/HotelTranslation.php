<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    use HasFactory;
    protected $table = 'hotel_translations';
    protected $guarded = [];
}
