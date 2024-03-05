<?php

namespace App\Models\Setting;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['description'];
    protected $translationForeignKey = 'setting_id';
    protected $table = 'settings';
    protected $guarded = [];
}
