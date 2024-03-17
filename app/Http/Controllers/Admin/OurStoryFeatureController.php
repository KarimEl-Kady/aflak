<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurStory\OurStory;
use App\Models\OurStory\OurStoryFeature;
use Illuminate\Http\Request;

class OurStoryFeatureController extends Controller
{
    //
    protected $view = 'admin_dashboard.our_story_features.';
    protected $route = 'our_story_features.';

    public function index()
    {
        $features = OurStoryFeature::all(); // Fetch all features
        return view($this->view . 'index', compact('features'));
    }

    public function update(Request $request)
    {
        $our_story = OurStory::firstOrCreate();

        if ($request->features && count($request->features) > 0) {
            foreach ($request->features as $featureLocale => $featureData) {
                foreach ($featureData as $localeCode => $feature) {
                    $feature_data[$localeCode] = [
                        'title' => $feature,
                    ];
                }
                $feature_data['our_story_id'] = $our_story->id;

                OurStoryFeature::create($feature_data);
            }
        }
        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }

    public function destroy ($id)
    {
        $feature = OurStoryFeature::find($id);
        $feature->delete();
        return redirect()->back()
            ->with(['success' => __("messages.deletemessage")]);
    }
}
