<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ServiceFeaturDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceFeature\StoreRequest;
use App\Http\Requests\Admin\ServiceFeature\UpdateRequest;
use App\Models\Service\Service;
use App\Models\Service\ServiceFeature;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceFeatureController extends Controller
{
    //
    protected $view = 'admin_dashboard.service_features.';
    protected $route = 'service_features.';

    public function index(ServiceFeaturDataTable $datatable)
    {

        return $datatable->render($this->view . 'index');
    }

    public function create()
    {
        $services = Service::get();
        return view($this->view . 'create' , compact('services'));
    }

    public function store(StoreRequest $request)
    {
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                 'text' => $request['text-' . $localeCode],
          ];
        }

        $data['service_id'] = $request->service_id;

       $service_feature = ServiceFeature::create($data);

        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $service_feature = ServiceFeature::whereId($id)->first();
        $services = Service::get();

        return view($this->view . 'edit', compact('service_feature' , 'services'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $service_feature = ServiceFeature::whereId($id)->first();

        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                 'text' => $request['text-' . $localeCode],
          ];
        }
        $data['service_id'] = $request->service_id;

        $service_feature->update($data);
        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $service_feature = ServiceFeature::whereId($id)->first();


        $service_feature->delete();
        return response()->json(['status' => true]);
    }
}
