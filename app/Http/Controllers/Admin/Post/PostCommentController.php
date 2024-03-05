<?php

namespace App\Http\Controllers\Admin\Post;

use App\DataTables\Admin\PostCommentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    protected $view = 'admin_dashboard.Posts.PostComments.';
    public function index(PostCommentDataTable $dataTable, $id)
    {

        return $dataTable->with('post_id', $id)->render($this->view . 'index');
    }
}
