<?php

namespace App\Models\Notification;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";

    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "notification_users", "notification_id", "user_id");
    }

    public function getImageLinkAttribute()
    {
        return $this->image ?  asset($this->image) : asset('assets/media/logo.png');
    }
}// End of model
