<?php

namespace App\Models\OurStory;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStoryFeature extends Model
{
    use HasFactory, Translatable;

    protected $table = 'our_story_features';

    public $translatedAttributes = ['title', 'text'];
    protected $translationForeignKey = 'our_story_feature_id';

    protected $guarded = [];
}
