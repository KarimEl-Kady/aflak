<?php

namespace App\Models\Section;

use App\Models\Blog\Blog;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory,Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'section_id';
    protected $table = 'sections';

    public function blogs()
    {
        return $this->belongsToMany(Blog::class ,'blog_sections', 'section_id','blog_id');
    }
}
