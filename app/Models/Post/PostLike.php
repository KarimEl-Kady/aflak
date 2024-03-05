<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLike extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["post_id", "user_id"];
    protected $table = "post_likes";

    /**
     * Get the user that belongs to this object.
     *
     * @param User::class $user_id The ID of the user.
     * @return User The user that belongs to this object.
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    /**
     * Retrieves the associated post for this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
