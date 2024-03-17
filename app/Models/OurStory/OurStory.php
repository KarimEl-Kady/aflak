<?php

namespace App\Models\OurStory;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    use HasFactory, Translatable;

    protected $table = 'our_stories';

    public $translatedAttributes = ['title', 'text' , 'label_title' , 'label_text'];
    protected $translationForeignKey = 'our_story_id';

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(OurStoryImage::class);
    }

}
