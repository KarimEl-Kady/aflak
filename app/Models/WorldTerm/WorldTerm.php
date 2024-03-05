<?php

namespace App\Models\WorldTerm;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldTerm extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['text'];
    protected $translationForeignKey = 'world_term_id';
    protected $table = 'world_terms';
    protected $guarded = [];
}
