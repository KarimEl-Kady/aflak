<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdvantageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advantage\StoreRequest;
use App\Http\Requests\Admin\Advantage\UpdateRequest;
use App\Models\Advantage\Advantage;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdvantageController extends Controller
{
    //
    protected $view = 'admin_dashboard.advantages.';
    protected $route = 'advantages.';

    public function index(AdvantageDataTable $datatable)
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
            $data["image"] = upload_image($request->image,"advantages");
        }


       $advantage = Advantage::create($data);

        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $advantage = Advantage::whereId($id)->first();
        return view($this->view . 'edit', compact('advantage'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $advantage = Advantage::whereId($id)->first();

        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = ['title' => $request['title-' . $localeCode],
                                 'text' => $request['text-' . $localeCode],
          ];
        }

        if($request->hasFile('image')){
            delete_image($advantage->image);
            $data["image"] = upload_image($request->image,"advantages");
        }


        $advantage->update($data);
        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $advantage = Advantage::whereId($id)->first();

       delete_image($advantage->image);

        $advantage->delete();
        return response()->json(['status' => true]);
    }
}
