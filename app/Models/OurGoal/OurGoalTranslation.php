<?php

namespace App\Models\OurGoal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoalTranslation extends Model
{
    use HasFactory;

    protected $table = 'our_goal_translations';

    protected $guarded = [];
}
