<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsEmailSetting\UpdateRequest;
use App\Models\NewsEmail\NewsEmaillSetting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsEmailSettingController extends Controller
{
    //
    protected $view = 'admin_dashboard.news_email_settings.';
    protected $route = 'news_email_settings.';

    public function index()
    {
        $news_email_setting = NewsEmaillSetting::firstOrNew();
        return view($this->view . 'index', compact('news_email_setting'));
    }

    public function update(UpdateRequest $request)
    {
        // dd($request->all());
        $news_email_setting = NewsEmaillSetting::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'subtitle' => $request['subtitle-' . $localeCode],
            ];
        }
        // dd($data);
        if($request->hasFile('image')){
            delete_image($news_email_setting->image);
            $data["image"] = upload_image($request->image,"news_email_settings");
        }
        $news_email_setting->update($data);


        return redirect()->back()
        ->with(['success'=> __("messages.editmessage")]);
}
}
