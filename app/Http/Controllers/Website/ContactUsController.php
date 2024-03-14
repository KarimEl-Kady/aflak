<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\EmailNews\StoreRequest;
use App\Models\NewsEmail\NewsEmail;
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
