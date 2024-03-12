<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    //
    protected $view = 'Website.services.';

    public function index()
    {
        return view($this->view . 'index');
    }
}
