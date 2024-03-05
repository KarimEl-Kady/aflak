<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pdf',
    ];
    protected $table = 'contracts';


    protected $appends = ["pdf_link"];

    public function getPdfLinkAttribute()
    {
        return  $this->pdf ? asset($this->pdf) : '';
    }
}
