<?php

namespace App\Models\JoinSection;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinSection extends Model
{
    use HasFactory,Translatable;
    protected $table = 'join_sections';
    protected $guarded = [];

    public $translatedAttributes = ['title', 'text'];
    protected $translationForeignKey = 'join_section_id';

    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
}
