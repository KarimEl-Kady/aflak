<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    protected $view = 'admin_dashboard.messages.';
    protected $route = 'messages.';

    public function index(MessageController $datatable)
    {
        return $datatable->render($this->view . 'index');
    }
}
