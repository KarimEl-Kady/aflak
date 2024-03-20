<?php

namespace App\Models\Privacy;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    use HasFactory,Translatable;
    protected $table = 'privacies';
    protected $guarded = [];

    public $translatedAttributes = ['text'];
    protected $translationForeignKey = 'privacy_id';
}
