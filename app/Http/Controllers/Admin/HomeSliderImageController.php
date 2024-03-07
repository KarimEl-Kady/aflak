<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\HomeSliderImageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSliderImage\StoreRequest;
use App\Http\Requests\Admin\HomeSliderImage\UpdateRequest;
use App\Models\HomeSlider\HomeSliderimage;
use Illuminate\Http\Request;

class HomeSliderImageController extends Controller
{
    //
    protected $view = 'admin_dashboard.home_slider_images.';
    protected $route = 'home_slider_images.';

    public function index(HomeSliderImageDataTable $datatable)
    {
        return $datatable->render($this->view . 'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();


        if($request->hasFile('image')){
            $data["image"] = upload_image($request->image,"home_slider_images");
        }

       $home_slider_image = HomeSliderimage::create($data);

        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $home_slider_image = HomeSliderimage::whereId($id)->first();
        return view($this->view . 'edit', compact('home_slider_image'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $home_slider_image = HomeSliderimage::whereId($id)->first();

        if($request->hasFile('image')){
            delete_image($home_slider_image->image);
            $data["image"] = upload_image($request->image,"home_slider_images");
        }

        $home_slider_image->update($data);
        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $home_slider_image = HomeSliderimage::whereId($id)->first();

       delete_image($home_slider_image->image);

        $home_slider_image->delete();
        return response()->json(['status' => true]);
    }


}
