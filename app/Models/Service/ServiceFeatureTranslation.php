<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeatureTranslation extends Model
{
    use HasFactory;

    protected $table = 'service_feature_translations';
    protected $guarded = [];
}
