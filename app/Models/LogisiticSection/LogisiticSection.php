<?php

namespace App\Models\LogisiticSection;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisiticSection extends Model
{
    use HasFactory, Translatable;

    protected $table = 'logistic_sections';

    public $translatedAttributes = ['first_text' , 'second_text'];
    protected $translationForeignKey = 'logistic_section_id';

    protected $guarded = [];

    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
}
