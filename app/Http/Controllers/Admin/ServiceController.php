<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Service\Service;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceController extends Controller
{
    //

    protected $view = 'admin_dashboard.services.';
    protected $route = 'services.';

    public function index(ServiceDataTable $datatable)
    {
        return $datatable->render($this->view . 'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreRequest $request)
    {
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                 'text' => $request['text-' . $localeCode],
          ];
        }

        if($request->hasFile('image')){
            $data["image"] = upload_image($request->image,"services");
        }

        if($request->hasFile('icon')){
            $data["icon"] = upload_image($request->image,"services");
        }


       $service = Service::create($data);

        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $service = Service::whereId($id)->first();
        return view($this->view . 'edit', compact('service'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $service = Service::whereId($id)->first();

        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                 'text' => $request['text-' . $localeCode],
          ];
        }

        if($request->hasFile('image')){
            delete_image($service->image);
            $data["image"] = upload_image($request->image,"services");
        }


        $service->update($data);
        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $service = Service::whereId($id)->first();

       delete_image($service->image);

        $service->delete();
        return response()->json(['status' => true]);
    }
}
