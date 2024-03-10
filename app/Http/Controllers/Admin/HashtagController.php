<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\HashtagDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hashtag\StoreRequest;
use App\Http\Requests\Admin\Hashtag\UpdateRequest;
use App\Models\Hashtag\Hashtag;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HashtagController extends Controller
{
    //
    protected $view = 'admin_dashboard.hashtags.';

    protected $route = 'hashtags.';

    public function index(HashtagDataTable $dataTable)
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

        Hashtag::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(Hashtag $hashtag)
    {
        return view($this->view . 'edit', compact('hashtag'));
    }

    public function update(UpdateRequest $request, Hashtag $hashtag)
    {
        //
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
            ];
        }

        $hashtag->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $hashtag = Hashtag::find($id);
        $hashtag->delete();
        return response()->json(['status' => true]);

    }
}
