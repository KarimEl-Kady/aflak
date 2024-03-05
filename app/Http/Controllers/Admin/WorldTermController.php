<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorldTerm\UpdateRequest;
use App\Models\WorldTerm\WorldTerm;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WorldTermController extends Controller
{
    //
    protected $view = 'admin_dashboard.world_terms.';
    protected $route = 'world_terms.';

    public function index()
    {
        $term = WorldTerm::firstOrNew();
        return view($this->view . 'index', compact('term'));
    }


    public function update(UpdateRequest $request)
    {
        $term = WorldTerm::firstOrCreate();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $data[$localeCode] = [
                'text' => $request['text-' . $localeCode],

            ];
        }

        $term->update($data);

        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }

}
