<?php

namespace App\Models\OurGoal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoalFeatureTranslation extends Model
{
    use HasFactory;

    protected $table = 'our_goal_feature_translations';

    protected $guarded = [];
}
