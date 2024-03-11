<?php

namespace App\Models\Blog;

use App\Models\Hashtag\Hashtag;
use App\Models\Section\Section;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'blog_sections';

}
