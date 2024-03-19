<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUs\UpdateRequest;
use App\Models\AboutUs\AboutUs;
use App\Models\AboutUs\AboutUsImage;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutUsController extends Controller
{
    //
    protected $view = 'admin_dashboard.about_us.';
    protected $route = 'about_us.';

    public function index()
    {
        $about_us = AboutUs::firstOrNew();
        $about_images = AboutUsImage::all();

        return view($this->view . 'index', compact('about_us', 'about_images'));
    }


        public function update(UpdateRequest $request)
        {

            // dd($request->feature_images);
            $about_us = AboutUs::firstOrCreate();
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                     'text' => $request['text-' . $localeCode],
              ];
            }

    // dd($request->images);
            $about_us->update($data);

            if($request->images && count($request->images) > 0){
                $about_us->images()->delete();
                foreach($request->images as $key => $image){
                    $image_data["image"] = upload_image($image, "why_us");
                    $image_data["about_us_id"] = $about_us->id;
                    AboutUsImage::create($image_data);
                }
            }

            return redirect()->back()
            ->with(['success'=> __("messages.editmessage")]);

        }



        public function destroy_image($id){
            $image = AboutUsImage::find($id);
            if($image) {
                $image->delete();
                return redirect()->back()->with(['success' => __("messages.deletemessage")]);
            } else {
                return redirect()->back()->with(['error' => __("messages.imagenotfound")]);
            }
        }

}
