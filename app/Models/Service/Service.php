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
}
