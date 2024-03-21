<?php

namespace App\Models\OurGoal;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoalFeature extends Model
{
    use HasFactory, Translatable;

    protected $table = 'our_goal_features';

    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'our_goal_feature_id';

    protected $guarded = [];
}
