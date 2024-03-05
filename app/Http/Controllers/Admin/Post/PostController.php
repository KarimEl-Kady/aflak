<?php

namespace App\Http\Controllers\Admin\Post;

use App\DataTables\Admin\PostDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $view = 'admin_dashboard.Posts.';
    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }
}
