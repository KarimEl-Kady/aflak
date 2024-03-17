<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs\AboutUs;
use App\Models\AboutUs\AboutUsFeature;
use App\Models\AboutUs\AboutUsImage;
use App\Models\Advantage\Advantage;
use App\Models\Blog\Blog;
use App\Models\Client\Client;
use App\Models\HomeSlider\HomeSlider;
use App\Models\HomeSlider\HomeSliderimage;
use App\Models\JoinSection\JoinSection;
use App\Models\Service\Service;
use App\Models\Step\Step;
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
        $aboutus = AboutUs::first();
        $aboutus_features = AboutUsFeature::get();
        $aboutus_images = AboutUsImage::get();
        $steps = Step::get();
        $join_section = JoinSection::first();
        $clients = Client::get();
        $last_blog = Blog::latest()->first(); // Get the last blog added
        if($last_blog){
        $blogs = Blog::where('id', '!=', $last_blog->id) // Exclude the last blog added
            ->orderBy('id', 'desc') // Order the blogs by ID in descending order
            ->take(2)
            ->get(); // Retrieve the results
    }else{
        $blogs = [];
    }
    return view($this->view . 'index', compact(
            'home_slider',
            'home_slider_images',
            'advantages',
            'services',
            'aboutus',
            'aboutus_features',
            'aboutus_images',
            'steps',
            'join_section',
            'clients',
            'blogs',
            'last_blog'
        ));
    }
}
