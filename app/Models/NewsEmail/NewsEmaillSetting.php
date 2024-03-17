<?php

namespace App\Models\NewsEmail;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEmaillSetting extends Model
{
    use HasFactory, Translatable;

    protected $table = 'news_email_settings';

    public $translatedAttributes = ['title', 'subtitle'];
    protected $translationForeignKey = 'news_email_setting_id';

    protected $guarded = [];

    protected $appends  = ["image_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }

}
