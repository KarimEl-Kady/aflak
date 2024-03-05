<?php

namespace App\Http\Controllers\Admin\Details;

use App\DataTables\Admin\RequestDataTable;
use App\DataTables\Admin\UserRequestDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    //
    protected $view = 'admin_dashboard.details.requestts';

    public function index(UserRequestDataTable $dataTable ,$id)
    {
        $dataTable->id = $id;
        return $dataTable->with('user_id',$id)->render($this->view . '.index');
    }
}
