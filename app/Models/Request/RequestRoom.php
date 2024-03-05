<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestRoom extends Model
{
    use HasFactory;
    protected $table='request_rooms';
    protected $guarded = [];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
