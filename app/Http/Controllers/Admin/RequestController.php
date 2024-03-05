<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RequestDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Request\StoreRequest;
use App\Http\Requests\Admin\Request\UpdateRequest;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RequestController extends Controller
{
    protected $view = 'admin_dashboard.requests.';
    protected $route = 'requests.';



    public function index(RequestDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }


    public function create()
    {
        return view($this->view . 'create');
    }


    public function store(StoreRequest $request)
    {

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'hotel_name' => $request['hotel_name-' . $localeCode], 'hotel_address' => $request['hotel_address-' . $localeCode],
                'count_persons' => $request['count_persons-' . $localeCode], 'count_rooms' => $request['count_rooms-' . $localeCode],
            ];
        }


        Request::create($data);



        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }


    public function edit($id)
    {
        $request = Request::whereId($id)->first();

        return view($this->view . 'edit', compact('request'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $request = Request::whereId($id)->firstOrFail();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'hotel_name' => $request['hotel_name-' . $localeCode], 'hotel_address' => $request['hotel_address-' . $localeCode],
                'count_persons' => $request['count_persons-' . $localeCode], 'count_rooms' => $request['count_rooms-' . $localeCode],
            ];
        }


        $request->update($data);


        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.editmessage")]);
    }


    public function destroy($id)
    {
        $request = Request::whereId($id)->firstOrFail();
        $request->delete();
        return response()->json(['status' => true]);
    }
}
