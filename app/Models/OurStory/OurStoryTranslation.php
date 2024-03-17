<?php

namespace App\Models\OurStory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'our_story_translations';

    protected $guarded = [];
}
