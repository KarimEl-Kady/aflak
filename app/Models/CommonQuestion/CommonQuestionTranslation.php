<?php

namespace App\Models\CommonQuestion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestionTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answer'];
    protected $table = 'common_question_translations';
}
