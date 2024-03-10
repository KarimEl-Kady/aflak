<?php

namespace App\Models\Hashtag;

use App\Models\Blog\Blog;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory,Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'hashtag_id';
    protected $table = 'hashtags';

    public function blogs()
    {
        return $this->belongsToMany(Blog::class ,'blog_hashtags', 'hashtag_id','blog_id');
    }
}
