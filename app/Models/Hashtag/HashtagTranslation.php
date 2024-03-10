<?php

namespace App\Models\Hashtag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HashtagTranslation extends Model
{
    use HasFactory;

    protected $table = 'hashtag_translations';
    public $timestamps = false;

    protected $fillable = ['title', 'locale'];
}
