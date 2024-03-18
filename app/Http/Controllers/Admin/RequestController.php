<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RequestDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    protected $view = 'admin_dashboard.requests.';

    protected $route = 'requests.';


    public function index(RequestDataTable $dataTable)
    {

            return $dataTable->render($this->view . 'index');
    }
}
