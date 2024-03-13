<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\JoinSectionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JoinSection\StoreRequest;
use App\Http\Requests\Admin\JoinSection\UpdateRequest;
use App\Models\JoinSection\JoinSection;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class JoinSectionController extends Controller
{
    //
    protected $view = 'admin_dashboard.join_sections.';
    protected $route = 'join_sections.';

    public function index(JoinSectionDataTable $datatable)
    {

        return $datatable->render($this->view . 'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreRequest $request ){

        $data=[];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {

            $data['image'] = upload_image($request->image, 'join_sections');
        }

        $join_section = JoinSection::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(JoinSection $join_section)
    {
        return view($this->view . 'edit', compact('join_section'));
    }

    public function update(UpdateRequest $request , JoinSection $join_section){
        $data = [] ;
        // dd($request);
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {
            delete_image($join_section->image);
            $data['image'] = upload_image($request->image, 'join_sections');
        }


        $join_section->update($data);
        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {

        $join_section = JoinSection::find($id);
        $join_section->delete();
        return response()->json(['status' => true]);
    }
}
