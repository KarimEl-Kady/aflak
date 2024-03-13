<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Hashtag\Hashtag;
use App\Models\Section\Section;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    protected $view = 'Website.blogs.';

    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        $sections = Section::get();
        $hashtags = Hashtag::get();
        $posts = Blog::orderBy('id', 'desc')->take(5)->get();
        return view($this->view . 'index', compact('blogs', 'sections', 'hashtags', 'posts'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::where('id', '!=', $id)->take(5)->get();

        return view($this->view . 'show', compact('blog', 'blogs'));
    }
}
