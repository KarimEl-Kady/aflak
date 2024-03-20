<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion\CommonQuestion;
use Illuminate\Http\Request;

class CommonQuestionController extends Controller
{
    //
    protected $view = 'Website.common_questions.';

    public function index()
    {
        // Retrieve content related to the common questions section
        $common_questions = CommonQuestion::get();

        // Return the index view for the common questions section with the retrieved data
        return view($this->view . 'index', compact('common_questions'));
    }
}
