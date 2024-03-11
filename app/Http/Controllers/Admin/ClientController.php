<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\StoreRequest;
use App\Http\Requests\Admin\Client\UpdateRequest;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClientController extends Controller
{
    //
    protected $view = 'admin_dashboard.clients.';
    protected $route = 'clients.';

    public function index(ClientDataTable $datatable)
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

        $data['name']    = $request->name;

        if($request->hasFile('image')){
            $data["image"] = upload_image($request->image,"clients");
        }


       $client = Client::create($data);

        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $client = Client::whereId($id)->first();
        return view($this->view . 'edit', compact('client'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $client = Client::whereId($id)->first();

        $data = [];

        $data['name']    = $request->name;

        if($request->hasFile('image')){
            delete_image($client->image);
            $data["image"] = upload_image($request->image,"clients");
        }


        $client->update($data);
        return redirect()->route($this->route."index")
        ->with(['success'=> __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $client = Client::whereId($id)->first();

       delete_image($client->image);

        $client->delete();
        return response()->json(['status' => true]);
    }

}
