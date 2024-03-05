<?php

namespace App\Http\Controllers\Api\Post;

use App\Helpers\PostsPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post\Post;
use App\Models\Post\PostLike;
use App\Models\Setting\Setting;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Point;

class PostController extends Controller
{
    use ApiTrait;

    /**
     * Add a new post.
     *
     * @param StorePostRequest $request The request data for creating a new post.
     * @throws \Exception If an error occurs while creating the post.
     * @return \Illuminate\Http\Response The response containing the newly created post.
     */
    public function add_post(StorePostRequest $request)
    {
        try {

            $authUser = User::findOrFail(auth()->id());
            $user_point = $authUser->points;
            $user_status = auth()->user()->status;
            // dd($user_status);
            $setting = Setting::first();
            $points = $setting?->post_points;
            if ($user_status != config('project_types.users_status.accept')) {
                return $this->errorResponse("your account is not premium", 404);
            } elseif (!$points) {
                return $this->errorResponse("this feature will be available soon", 404);
            } else {

                if ($user_point >= $points) {
                    $post =  Post::create([
                        'content' => $request->content,
                        "user_id" => auth()->id()
                    ]);
                    $removePoint = new PostsPermission();
                    $point = $removePoint->deductPoints($points);
                    $authUser->points = $point;
                    $authUser->save();
                } else {
                    return $this->errorResponse("your points are not enough", 404);
                }
            }
            $msg = __("message. add Post Successfully");
            return $this->dataResponse($msg, new PostResource($post), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    /**
     * Fetches posts.
     *
     * @throws \Exception when an error occurs while fetching posts.
     * @return mixed the response object containing the fetched posts.
     */
    public function fetch_posts()
    {
        try {
            $posts = Post::get();
            return $this->dataResponse("fetch_posts", PostResource::collection($posts), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    /**
     * Like a post.
     *
     * @param Request $request The HTTP request object.
     *                        It contains the following attributes:
     *                        - post_id: The ID of the post to be liked (required, exists in the 'posts' table).
     * @throws \Exception If an error occurs during the liking process.
     * @return mixed The response containing the result of the liking process.
     *               It can be one of the following:
     *               - If the post is successfully liked, a success message along with the updated post data (status code: 200).
     *               - If the post is already liked, the like is removed and a success message along with the updated post data (status code: 200).
     *               - If the validation fails, a validation error message (status code: 422).
     *               - If an exception occurs, an error message (status code: 500).
     */
    public function like_post(Request $request)
    {
        try {

            $rules = [
                "post_id" => "required|exists:posts,id",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->getvalidationErrors($validator);
            }

            $post = Post::whereId($request->post_id)->first();
            $postLike = PostLike::where("post_id", $request->post_id)->where("user_id", auth()->id())->first();
            if (!$postLike) {
                $postLike = PostLike::create([
                    "post_id" => $request->post_id,
                    "user_id" => auth()->id()
                ]);
                $msg = __("message. add like Successfully");
                return $this->dataResponse($msg, new PostResource($post), 200);
            } else {
                $postLike->delete();
                $msg = __("message. remove like Successfully");
                return $this->dataResponse($msg, new PostResource($post), 200);
            }
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
