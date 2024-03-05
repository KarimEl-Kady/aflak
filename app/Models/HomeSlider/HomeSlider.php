<?php

namespace App\Models\HomeSlider;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory , Translatable;
    protected $table = 'home_sliders';

    public $translatedAttributes = ['title','text'];
    protected $translationForeignKey = 'home_slider_id';
    
    protected $guarded = [];
}
