<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LogisiticSection\UpdateRequest;
use App\Models\LogisiticSection\LogisiticSection;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LogisiticSectionController extends Controller
{
    //
    protected $view = 'admin_dashboard.logisitic_setcions.';
    protected $route = 'logisitic_setcions.';

    public function index()
    {
        $logisitic_section = LogisiticSection::firstOrNew();
        return view($this->view . 'index', compact('logisitic_section'));
    }

    public function update(UpdateRequest $request)
    {
        // dd($request->all());
        $logisitic_section = LogisiticSection::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'first_text' => $request['first_text-' . $localeCode],
                'second_text' => $request['second_text-' . $localeCode],
            ];
        }
        // dd($data);
        if($request->hasFile('image')){
            delete_image($logisitic_section->image);
            $data["image"] = upload_image($request->image,"logisitic_sections");
        }
        // dd($data);  
        $logisitic_section->update($data);


        return redirect()->back()
        ->with(['success'=> __("messages.editmessage")]);
}
}
