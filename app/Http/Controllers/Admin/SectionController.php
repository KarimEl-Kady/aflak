<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Section\StoreRequest;
use App\Http\Requests\Admin\Section\UpdateRequest;
use App\Models\Section\Section;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SectionController extends Controller
{
    //
    protected $view = 'admin_dashboard.sections.';

    protected $route = 'sections.';


    public function index(SectionDataTable $dataTable)
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

        Section::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(Section $section)
    {
        return view($this->view . 'edit', compact('section'));
    }

    public function update(UpdateRequest $request, Section $section)
    {
        //
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
            ];
        }

        $section->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return response()->json(['status' => true]);

    }
}
