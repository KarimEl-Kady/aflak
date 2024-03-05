<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreCommentRequest;
use App\Http\Resources\Api\CommentResource;
use App\Models\Post\PostComment;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use ApiTrait;

    /**
     * Add a comment.
     *
     * @param StoreCommentRequest $request The request containing the comment data.
     * @throws \Exception If an error occurs while adding the comment.
     * @return \Illuminate\Http\Response The response containing the comment data.
     */
    public function add_comment(StoreCommentRequest $request)
    {
        try {
            $comment =  PostComment::create([
                'content' => $request->content,
                'post_id' => $request->post_id,
                "user_id" => auth()->id()
            ]);
            $msg = __("message. add comment Successfully");
            return $this->dataResponse($msg, new CommentResource($comment), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    /**
     * Fetches the comments for a specific post.
     *
     * @param int $post_id The ID of the post.
     * @throws \Exception If an error occurs while fetching the comments.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the fetched comments.
     */
    public function fetch_post_comments(Request $request)
    {
        try {
            $comments = PostComment::where("post_id", $request->post_id)->get();
            return $this->dataResponse("fetch_post_comments", CommentResource::collection($comments), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
