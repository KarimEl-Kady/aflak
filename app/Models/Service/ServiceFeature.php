<?php

namespace App\Models\Service;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    use HasFactory, Translatable;

    protected $table = 'service_features';

    public $translatedAttributes = ['title','text'];
    protected $translationForeignKey = 'service_feature_id';

    protected $guarded = [];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
