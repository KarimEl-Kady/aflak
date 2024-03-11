<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NewsEmailDatatTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailNewsController extends Controller
{
    //
    protected $view = 'admin_dashboard.email_news.';
    protected $route = 'email_news.';

    public function index(NewsEmailDatatTable $datatable)
    {
        return $datatable->render($this->view . 'index');
    }
    
}
