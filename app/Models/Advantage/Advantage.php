<?php

namespace App\Models\Advantage;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory , Translatable;

    protected $table = 'advantages';
    public $translatedAttributes = ['title','text'];
    protected $translationForeignKey = 'advantage_id';

    protected $guarded = [];
}
