<?php

namespace App\Models\OurGoal;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoal extends Model
{
    use HasFactory,Translatable;

    protected $table = 'our_goals';

    public $translatedAttributes = [ 'text'];
    protected $translationForeignKey = 'our_goal_id';

    protected $guarded = [];

    protected $appends  = ["image_link"];
    public function getImageLinkAttribute()
    {
        return $this->image ? asset($this->image) : '';
    }


}
