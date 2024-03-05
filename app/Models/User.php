<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Notification\Notification;
use App\Models\Offer\Offer;
use App\Models\Request\Request;
use App\Models\Setting\Setting;
use App\Models\User\UserDevice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $appends = ["image_link"];

    public function getImageLinkAttribute()
    {
        return  $this->image ? asset($this->image) : '';
    }

    public function getSignatureImageLinkAttribute()
    {
        return  $this->signature_image ? asset($this->signature_image) : '';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_devices(): HasMany
    {
        return $this->hasMany(UserDevice::class);
    }
    public function user_device(): HasOne
    {
        return $this->hasOne(UserDevice::class);
    }

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function convert_offer_to_points($offer):float{
        $setting = Setting::first();

        $points = 0;

        if($setting && $setting->points && $setting->offer){

        $points = ($offer * ($setting->points)) / $setting->offer;
        }
        return $points;
    }

    public function convert_post_to_points($post):float{
        $setting = Setting::first();

        $points = 0;

        if($setting && $setting->post_points && $setting->post){

        $points = ($post * ($setting->post_points)) / $setting->post;
        }
        return $points;
    }

    public function notifications(){
        return $this->belongsToMany(Notification::class, 'notification_users', 'user_id', 'notification_id');
    }

}
