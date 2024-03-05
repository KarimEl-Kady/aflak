<?php

namespace App\Models\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["content", "user_id"];
    protected $table = "posts";
    protected $appends = ["date_format"];

    /**
     * Retrieves the date format attribute.
     *
     * @return string The formatted date.
     */
    public function getDateFormatAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    /**
     * Retrieves the associated User model for this Post.
     *
     * @param string $foreignKey The foreign key column name.
     * @throws \Exception If the User model cannot be found.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The BelongsTo relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    /**
     * Retrieve the comments associated with this Post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, "post_id");
    }

    /**
     * Retrieves the likes associated with this post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(PostLike::class, "post_id");
    }

    public function isLiked()
    {
        $like = PostLike::where("post_id", $this->id)->where("user_id", auth()->id())->first();
        if ($like) {
            return 1;
        }
        return 0;
    }
}
