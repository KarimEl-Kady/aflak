<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StepDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Step\StoreRequest;
use App\Http\Requests\Admin\Step\UpdateRequest;
use App\Models\Step\Step;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StepController extends Controller
{
    //
    protected $view = 'admin_dashboard.steps.';

    protected $route = 'steps.';

    public function index(StepDataTable $dataTable)
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
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {

            $data['image'] = upload_image($request->image, 'teachers');
        }
        Step::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit(Step $step)
    {
        return view($this->view . 'edit', compact('step'));
    }

    public function update(UpdateRequest $request, Step $step)
    {
        //
        $data = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'title' => $request['title-' . $localeCode],
                'text' => $request['text-' . $localeCode],
            ];
        }

        if ($request->hasFile('image')) {
            delete_image($step->image);
            $data['image'] = upload_image($request->image, 'teachers');
        }
        $step->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.updatemessage")]);
    }

    public function destroy($id)
    {
        $step = Step::find($id);
        delete_image($step->image);
        $step->delete();
        return response()->json(['status' => true]);

    }
}
