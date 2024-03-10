<?php

namespace App\Models\NewsEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEmail extends Model
{
    use HasFactory;

    protected $table = 'news_emails';

    protected $guarded = [];
}
