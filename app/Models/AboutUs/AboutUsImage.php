<?php

namespace App\Models\AboutUs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsImage extends Model
{
    use HasFactory;
    protected $table = 'about_us_images';
    protected $guarded = [];

    protected $appends  = ["image_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
    public function about_us()
    {
        return $this->belongsTo(AboutUs::class);
    }

}
