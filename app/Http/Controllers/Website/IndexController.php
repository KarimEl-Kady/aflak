<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Advantage\Advantage;
use App\Models\HomeSlider\HomeSlider;
use App\Models\HomeSlider\HomeSliderimage;
use App\Models\Service\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    protected $view = 'Website.';

    public function index()
    {
        $home_slider = HomeSlider::first();
        $home_slider_images = HomeSliderimage::get();
        $advantages = Advantage::get();
        $services = Service::get();
        return view($this->view . 'index', compact('home_slider' , 'home_slider_images' , 'advantages'  , 'services'));
    }
}
