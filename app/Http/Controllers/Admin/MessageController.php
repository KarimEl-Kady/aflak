<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\MessageDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    protected $view = 'admin_dashboard.messages.';
    protected $route = 'messages.';

    public function index(MessageDataTable $datatable)
    {
        return $datatable->render($this->view . 'index');
    }
}
