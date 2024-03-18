<?php

namespace App\Models\RequestSection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSectionTranslation extends Model
{
    use HasFactory;

    protected $table = 'request_section_translations';

    protected $guarded = [];
}
