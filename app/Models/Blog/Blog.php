<?php

namespace App\Models\Blog;

use App\Models\Hashtag\Hashtag;
use App\Models\Section\Section;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['title','description'];
    protected $translationForeignKey = 'blog_id';
    protected $table = 'blogs';

    protected $appends  = ["image_link"];

    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class ,'blog_sections','blog_id', 'section_id');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class ,'blog_hashtags','blog_id', 'hashtag_id');
    }

    public function getDateFormatAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
