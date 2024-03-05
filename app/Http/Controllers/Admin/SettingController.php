<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends Controller
{
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


        $data['points'] = $request->points;
        $data['post_points'] = $request->post_points;
        $data['value_of_upgrate'] = $request->value_of_upgrate;
        $data['facebook'] = $request->facebook;
        $data['youtube'] = $request->youtube;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['tiktok'] = $request->tiktok;
        $data['whatsapp'] = $request->whatsapp;
        $data['phone'] = $request->phone;
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'description' => $request['description-' . $localeCode],

            ];
        }

        $setting->update($data);

        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }
}
