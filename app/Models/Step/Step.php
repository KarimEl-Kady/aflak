<?php

namespace App\Models\Step;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory,Translatable;
    protected $table = 'steps';
    protected $guarded = [];

    public $translatedAttributes = ['title', 'text'];
    protected $translationForeignKey = 'step_id';

    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
}
