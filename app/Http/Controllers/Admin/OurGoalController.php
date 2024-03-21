<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OurGoal\UpdateRequest;
use App\Models\OurGoal\OurGoal;
use App\Models\OurGoal\OurGoalFeature;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OurGoalController extends Controller
{
    //
    protected $view = 'admin_dashboard.our_goals.';
    protected $route = 'our_goals.';

    public function index()
    {
        $features = OurGoalFeature::all();
        $our_goal = OurGoal::firstOrNew();
        return view($this->view . 'index', compact('our_goal' , 'features'));
    }




    public function update(UpdateRequest $request)
    {
        // dd($request->features[1]);
        $our_goal = OurGoal::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'text' => $request['text-' . $localeCode],
            ];
        }
        if($request->hasFile("image")) {
            $data["image"] = upload_image($request->image, "goals");
        }

        if ($request->features && count($request->features) > 0) {
            foreach ($request->features as $featureLocale => $featureData) {
                foreach ($featureData as $localeCode => $feature) {
                    $feature_data[$localeCode] = [
                        'title' => $feature,
                    ];
                }


                OurGoalFeature::create($feature_data);
            }
        }

        $our_goal->update($data);


        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }

    public function destroy_features ($id)
    {
        $feature = OurGoalFeature::find($id);
        $feature->delete();
        return redirect()->back()
            ->with(['success' => __("messages.deletemessage")]);
    }
}
