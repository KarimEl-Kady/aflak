<?php

namespace App\Models\RequestSection;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSection extends Model
{
    use HasFactory,Translatable;

    protected $table = 'request_sections';
    public $translatedAttributes = ['title','text'];

    protected $translationForeignKey = 'request_section_id';

    protected $guarded = [];

    protected $appends  = ["image_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
}
