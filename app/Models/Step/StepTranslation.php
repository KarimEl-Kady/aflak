<?php

namespace App\Models\Step;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepTranslation extends Model
{
    use HasFactory;
    protected $table = 'step_translations';
    protected $guarded = [];
}
