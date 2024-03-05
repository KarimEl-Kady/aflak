<?php

namespace App\Models\Hotel;

use App\Models\Request\Request;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Hotel extends Model
{
    use HasFactory, Translatable;
    protected $table = 'hotels';
    public $translatedAttributes = ['name','country'];
    protected $translationForeignKey = 'hotel_id';
    protected $guarded = [];

}
