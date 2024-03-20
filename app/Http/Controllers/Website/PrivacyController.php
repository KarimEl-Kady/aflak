<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Privacy\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //

    protected $view = 'Website.privacies.';

    public function index()
    {
        $privacies = Privacy::first(); // Assuming you only need the first privacy record


        // Return the index view for the privacy policy section with the retrieved data
        return view($this->view . 'index', compact('privacies'));
    }
}
