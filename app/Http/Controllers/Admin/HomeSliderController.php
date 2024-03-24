<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSlider\UpdateRequest;
use App\Models\HomeSlider\HomeSlider;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeSliderController extends Controller
{
    //
    protected $view = 'admin_dashboard.home_sliders.';
    protected $route = 'home_sliders.';

    public function index()
    {
        $home_slider = HomeSlider::firstOrNew();
        return view($this->view . 'index', compact('home_slider'));
    }

    public function update(UpdateRequest $request)
    {
        $home_slider = HomeSlider::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'subtitle' => $request['subtitle-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }
        // dd($data);
        $home_slider->update($data);


        return redirect()->back()
        ->with(['success'=> __("messages.editmessage")]);
    }
}
