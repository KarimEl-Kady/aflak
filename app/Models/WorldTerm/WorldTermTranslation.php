<?php

namespace App\Models\WorldTerm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldTermTranslation extends Model
{
    use HasFactory;
    protected $table = 'world_term_translations';
    protected $fillable =   ['text'];
}
