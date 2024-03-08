<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AboutUsFeatureDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsFeature\StoreRequest;
use App\Http\Requests\Admin\AboutUsFeature\UpdateRequest;
use App\Models\AboutUs\AboutUsFeature;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutUsFeatureController extends Controller
{
    //
    protected $view = 'admin_dashboard.about_us_features.';
    protected $route = 'about_us_features.';

    public function index(AboutUsFeatureDataTable $datatable)
    {
        return $datatable->render($this->view . 'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }


    public function store(StoreRequest $request)
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {

            $data['image'] = upload_image($request->image, 'why_us_features');
        }

        AboutUsFeature::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(AboutUsFeature $about_us_feature)
    {
        return view($this->view . 'edit', compact('about_us_feature'));
    }


    public function update(UpdateRequest $request, AboutUsFeature $about_us_feature)
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {
            delete_image($about_us_feature->image);

            $data['image'] = upload_image($request->image, 'why_us_features');
        }
        $about_us_feature->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }


    public function destroy($id)
    {
        $about_us_feature = AboutUsFeature::find($id);
        $about_us_feature->delete();
        return response()->json(['status' => true]);
    }
}
