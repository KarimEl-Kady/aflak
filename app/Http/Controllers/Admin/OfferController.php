<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OfferDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
    protected $view = 'admin_dashboard.offers.';
    protected $route = 'offers.';

    public function index(OfferDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

}
