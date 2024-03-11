<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use App\Models\Blog\Blog;
use App\Models\Hashtag\Hashtag;
use App\Models\Section\Section;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogController extends Controller
{
    //

    protected $view = 'admin_dashboard.blogs.';

    protected $route = 'blogs.';

    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

    public function create()
    {
        $sections = Section::get();
        $hashtags = Hashtag::get();
        return view($this->view . 'create',compact('sections','hashtags'));
    }

    public function store(StoreRequest $request)
    {
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'description' => $request['description-' . $localeCode],
            ];
        }

        if($request->hasFile('image')){

            $data['image'] = upload_image($request->image,'blogs');
        }
        $blog = Blog::create($data);

        $blog->sections()->attach($request->section_ids);
        $blog->hashtags()->attach($request->hashtag_ids);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(Blog $blog)
    {
        $sections = Section::get();
        $hashtags = Hashtag::get();
        return view($this->view . 'edit', compact('blog','hashtags','sections'));
    }

    public function update(UpdateRequest $request, Blog $blog)
    {

        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'description' => $request['description-' . $localeCode],
            ];
        }

        if($request->hasFile('image') && $request->image != null){
            delete_image($blog->image);
            $data['image'] = upload_image($request->image,'blogs');
        }

        $blog->update($data);

        $blog->sections()->sync($request->section_ids);
        $blog->hashtags()->sync($request->hashtag_ids);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        delete_image($blog->image);
        $blog->delete();
        return response()->json(['status' => true]);

    }
}
