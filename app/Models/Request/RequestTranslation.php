<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTranslation extends Model
{
    use HasFactory;
    protected $table = 'request_translations';
    protected $guarded =[];
}
