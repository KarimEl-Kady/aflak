<?php

namespace App\Models\NewsEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEmailImage extends Model
{
    use HasFactory;

    protected $table = 'news_email_images';

    protected $guarded = [];

    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
}
