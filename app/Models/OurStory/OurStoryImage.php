<?php

namespace App\Models\OurStory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStoryImage extends Model
{
    use HasFactory;

    protected $table = 'our_story_images';

    protected $guarded = [];

    protected $appends  = ["image_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }

    public function our_story()
    {
        return $this->belongsTo(OurStory::class);
    }
}
