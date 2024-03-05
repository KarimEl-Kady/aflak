<?php

namespace App\Models\User;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWallet extends Model
{
    use HasFactory;
    protected $table = 'user_wallets';
    protected $guarded = [];

    protected $appends =["date_format"];

    protected $appendss  = ["receipt_image_link"];

    public function getReceiptImageLinkAttribute()
    {
        return $this->receipt_image ? asset($this->receipt_image) : '';
    }
    public function getDateFormatAttribute(){
        return Carbon::parse($this->created_at)->format('Y-m-d') ;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
