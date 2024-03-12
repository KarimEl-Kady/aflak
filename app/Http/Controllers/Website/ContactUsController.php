<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    protected $view = 'Website.contact_us.';

    public function index()
    {
        return view($this->view . 'index');
    }

}
