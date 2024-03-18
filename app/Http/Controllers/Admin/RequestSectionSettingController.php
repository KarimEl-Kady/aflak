<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RequestSectionSettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RequestSectionSetting\StoreRequest;
use App\Http\Requests\Admin\RequestSectionSetting\UpdateRequest;
use App\Models\RequestSection\RequestSectionSetting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RequestSectionSettingController extends Controller
{
    //

    protected $view = 'admin_dashboard.request_section_settings.';

    protected $route = 'request_section_settings.';


    public function index(RequestSectionSettingDataTable $dataTable)
    {

            return $dataTable->render($this->view . 'index');

    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreRequest $request)
    {
        //
        
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
            ];
        }
        $data['type'] = $request->type;
        RequestSectionSetting::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(RequestSectionSetting $request_section_setting)
    {
        return view($this->view . 'edit', compact('request_section_setting'));
    }

    public function update(UpdateRequest $request, RequestSectionSetting $request_section_setting)
    {
        //
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
            ];
        }
        $data['type'] = $request->type;

        $request_section_setting->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $request_section_setting = RequestSectionSetting::find($id);
        $request_section_setting->delete();
        return response()->json(['status' => true]);

    }
}
