<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    //
    protected $view = 'Website.services.';

    public function index()
    {
        $services = Service::get();
        return view($this->view . 'index' , compact('services'));
    }
}
