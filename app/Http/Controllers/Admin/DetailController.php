<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DetailDataTable;
use App\DataTables\Admin\RequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\Request\Request as RequestRequest;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    protected $view = 'admin_dashboard.details.';
    protected $route = 'details.';

    public function index(DetailDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

}
