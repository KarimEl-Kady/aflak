<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    use HasFactory;
    protected $table = 'service_translations';
    protected $guarded =  [];
}
