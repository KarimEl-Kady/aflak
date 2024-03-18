<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RequestSection\UpdateRequest;
use App\Models\RequestSection\RequestSection;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RequestSectionController extends Controller
{
    //
    protected $view = 'admin_dashboard.request_sections.';
    protected $route = 'request_sections.';

    public function index()
    {
        $request_section = RequestSection::firstOrNew();
        return view($this->view . 'index', compact('request_section'));
    }

    public function update(UpdateRequest $request)
    {
        // dd($request->all());
        $request_section = RequestSection::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }
        // dd($data);
        if($request->hasFile('image')){
            delete_image($request_section->image);
            $data["image"] = upload_image($request->image,"request_sections");
        }
        $request_section->update($data);


        return redirect()->back()
        ->with(['success'=> __("messages.editmessage")]);
}
}
