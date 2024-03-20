<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CommonQuestionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommonQuestion\StoreRequest;
use App\Http\Requests\Admin\CommonQuestion\UpdateRequest;
use App\Models\CommonQuestion\CommonQuestion;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CommonQuestionController extends Controller
{
    //
    protected $view = 'admin_dashboard.common_questions.';
    protected $route = 'common_questions.';


    public function index(CommonQuestionDataTable $dataTable)
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
                'question' => $request['question-' . $localeCode],
                'answer' => $request['answer-' . $localeCode],

            ];
        }


        CommonQuestion::create($data);


        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit($id)
    {
        $common_question = CommonQuestion::whereId($id)->firstOrFail();
        return view($this->view . 'edit', compact('common_question'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $common_question = CommonQuestion::whereId($id)->firstOrFail();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'question' => $request['question-' . $localeCode],
                'answer' => $request['answer-' . $localeCode],

            ];
        }


        $common_question->update($data);


        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.editmessage")]);
    }


    public function destroy($id)
    {
        $common_question = CommonQuestion::whereId($id)->firstOrFail();
        $common_question->delete();
        return response()->json(['status' => true]);
    }
}
