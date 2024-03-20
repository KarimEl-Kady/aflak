<?php

namespace App\Models\CommonQuestion;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestion extends Model
{
    use HasFactory,Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['question','answer'];
    protected $translationForeignKey = 'common_question_id';
    protected $table = 'common_questions';
}
