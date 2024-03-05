<?php

namespace App\Models\HomeBanner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;
    protected $table='home_banners';
    protected $guarded =[];
    protected $appends = ["image_link"];

    public function getImageLinkAttribute()
    {
        return  $this->image ? asset($this->image) : '';
    }
}
