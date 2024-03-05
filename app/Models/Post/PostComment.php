<?php

namespace App\Models\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["content", "user_id", "post_id"];
    protected $table = "post_comments";


    /**
     * Get the format of the date attribute.
     *
     * @return string The format of the date attribute.
     */
    public function getDateFormatAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    /**
     * Retrieve the associated user for this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    protected $appends = ["date_format"];


    /**
     * Get the associated post for this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
