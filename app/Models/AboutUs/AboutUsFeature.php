<?php

namespace App\Models\AboutUs;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsFeature extends Model
{
    use HasFactory, Translatable;

    protected $table = 'about_us_features';

    protected  $translationForeignKey = 'about_us_feature_id';

    public $translatedAttributes = ['title','text'];

    protected $guarded = [];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }

    public function about_us()
    {
        return $this->belongsTo(AboutUs::class);
    }
}
