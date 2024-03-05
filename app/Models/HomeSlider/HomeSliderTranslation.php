<?php

namespace App\Models\HomeSlider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSliderTranslation extends Model
{
    use HasFactory;
    protected $table = 'home_slider_translations';
    protected $fillable =  ['title' , 'text'];

}
