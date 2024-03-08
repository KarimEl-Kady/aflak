<?php

namespace App\Models\Service;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Translatable;
    protected $table = 'services';
    public $translatedAttributes = ['title','text'];
    protected $translationForeignKey = 'service_id';
    protected $guarded = [];

    protected $appends = ["image_link", "icon_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }

    public function getIconLinkAttribute()
    {
        return $this->icon ? asset($this->icon) : '';
    }
}
