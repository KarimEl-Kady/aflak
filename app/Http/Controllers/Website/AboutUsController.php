<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Advantage\Advantage;
use App\Models\Client\Client;
use App\Models\LogisiticSection\LogisiticSection;
use App\Models\OurStory\OurStory;
use App\Models\OurStory\OurStoryFeature;
use App\Models\OurStory\OurStoryImage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    protected $view = 'Website.about_us.';

    public function index(){

        $advantages = Advantage::get();
        $our_story = OurStory::first();
        $our_story_features = OurStoryFeature::get();
        $our_story_images = OurStoryImage::get();
        $logistic_sectoion = LogisiticSection::first();
        $clients = Client::get();

        return view($this->view . 'index', compact('advantages' ,
         'our_story' ,
          'our_story_features' ,
           'our_story_images' ,
            'logistic_sectoion',
            'clients',
        ));
    }
}
