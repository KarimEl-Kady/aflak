<?php

namespace App\Models\Advantage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvantageTranslation extends Model
{
    use HasFactory;
    protected $table = 'advantage_translations';
    protected $guarded =  [];
}
