<?php

namespace App\Models\AboutUs;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory , Translatable;
    protected $table = 'about_us';

    protected  $translationForeignKey = 'about_us_id';
    public $translatedAttributes = ['title', 'text'];

    protected $guarded = [];
    
}
