<?php

namespace App\Models\Setting;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory,Translatable;
    protected $table = 'settings';
    protected $guarded = [];

    public $translatedAttributes = ['address'];
    protected $translationForeignKey = 'setting_id';

    protected $appends  = ["logo_link"];

    public function getLogoLinkAttribute()
    {
        return $this->logo ? asset($this->logo) : '';
    }
}
