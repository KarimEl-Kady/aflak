<?php

namespace App\Models\User;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPoint extends Model
{
    use HasFactory;
    protected $table = 'user_points';
    protected $guarded = [];

    protected $appends =["date_format"];


    public function getDateFormatAttribute(){
        return Carbon::parse($this->created_at)->format('Y-m-d') ;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
