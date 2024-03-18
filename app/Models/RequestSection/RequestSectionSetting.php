<?php

namespace App\Models\RequestSection;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSectionSetting extends Model
{
    use HasFactory,Translatable;

    protected $table = 'request_section_settings';

    public $translatedAttributes = ['title'];

    protected $translationForeignKey = 'request_section_setting_id';

    protected $guarded = [];
}
