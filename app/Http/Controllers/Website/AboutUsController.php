<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Advantage\Advantage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    protected $view = 'Website.about_us.';

    public function index(){

        $advantages = Advantage::get();

        return view($this->view . 'index', compact('advantages'));
    }
}
