<?php

namespace App\Models\Request;

use App\Models\Offer\Offer;
use App\Models\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Request extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['hotel_name', 'hotel_address',];
    protected $translationForeignKey = 'request_id';
    protected $table = 'requests';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
    public function rooms(): HasMany
    {
        return $this->HasMany(RequestRoom::class);
    }

    public function calculateRemainingTime(Request $request)
    { //to calculate the remaining time from now
        $now = now();
        $checkin = strtotime($this->$request->chekin);
        $remainingTimeInSeconds = $checkin - strtotime($now);



        $remainingMinutes = doubleval($remainingTimeInSeconds / 60) ;

        return [

            'remaining_minutes' => $remainingMinutes,
        ];
    }
}
