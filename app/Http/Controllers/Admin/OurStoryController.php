<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OurStory\UpdateRequest;
use App\Models\OurStory\OurStory;
use App\Models\OurStory\OurStoryFeature;
use App\Models\OurStory\OurStoryImage;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OurStoryController extends Controller
{
    //


    protected $view = 'admin_dashboard.our_stories.';
    protected $route = 'our_stories.';

    public function index()
    {
        $features = OurStoryFeature::all();
        $our_story_images = OurStoryImage::all();
        $our_story = OurStory::firstOrNew();
        return view($this->view . 'index', compact('our_story' , 'features' , 'our_story_images'));
    }




    public function update(UpdateRequest $request)
    {
        // dd($request->features[1]);
        $our_story = OurStory::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
                'label_title' => $request['label_title-' . $localeCode],
                'label_text' => $request['label_text-' . $localeCode],

            ];
        }
        if ($request->images && count($request->images) > 0) {
            foreach ($request->images as $key => $image) {
                $image_data["image"] = upload_image($image, "home_header");
                $image_data["our_story_id"] = $our_story->id;
                OurStoryImage::create($image_data);
            }
        }

        if ($request->features && count($request->features) > 0) {
            foreach ($request->features as $featureLocale => $featureData) {
                foreach ($featureData as $localeCode => $feature) {
                    if (!empty($feature)) { // Check if feature is not empty
                        $feature_data[$localeCode] = [
                            'title' => $feature,
                        ];
                    }
                }
                // Check if there's any feature data to be saved
                if (!empty($feature_data)) {
                    $feature_data['our_story_id'] = $our_story->id;
                    OurStoryFeature::create($feature_data);
                }
            }
        }


        $our_story->update($data);


        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }

    public function destroy_features ($id)
    {
        $feature = OurStoryFeature::find($id);
        $feature->delete();
        return redirect()->back()
            ->with(['success' => __("messages.deletemessage")]);
    }

    public function destroy_stroy_image($id){
        $image = OurStoryImage::find($id);
        $image->delete();
        return redirect()->back()
            ->with(['success' => __("messages.deletemessage")]);
    }
}
