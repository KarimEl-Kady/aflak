<?php

namespace App\Models\NewsEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEmaillSettingTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_email_setting_translations';

    protected $guarded = [];
}
