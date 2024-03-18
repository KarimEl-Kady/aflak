<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends Controller
{
    //
    protected $view = 'admin_dashboard.settings.';
    protected $route = 'settings.';

    public function index()
    {
        $setting = Setting::firstOrNew();
        return view($this->view . 'index', compact('setting'));
    }


    public function update(UpdateRequest $request)
    {
        $setting = Setting::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['address' => $request['address-' . $localeCode]
          ];
        }

        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['twitter']=$request->twitter;
        $data['facebook']=$request->facebook;
        $data['linkedin']=$request->linkedin;
        $data['instagram']=$request->instagram;
        $data['youtube']=$request->youtube;
        // $data['lat']=$request->lat;
        // $data['lon']=$request->lon;

        if($request->hasFile("logo")) {
            $data["logo"] = upload_image($request->logo, "settings");
        }

        $setting->update($data);


        return redirect()->back()
        ->with(['success'=> __("messages.editmessage")]);

    }
}
