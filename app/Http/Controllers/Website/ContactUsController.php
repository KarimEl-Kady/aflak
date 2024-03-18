<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\EmailNews\StoreRequest;
use App\Models\NewsEmail\NewsEmail;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    protected $view = 'Website.contact_us.';

    public function index()
    {
        $setting = Setting::first();
        return view($this->view . 'index' ,compact('setting'));
    }


}
