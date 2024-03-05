<?php

namespace App\Http\Controllers\Admin\Details;

use App\DataTables\Admin\UserOfferDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserOfferController extends Controller
{
    //
    protected $view = 'admin_dashboard.details.ofers';

    public function index(UserOfferDataTable $dataTable ,$id)
    {
        // $reqid = User::find($id);
        $dataTable->id = $id;
        return $dataTable->with(['user_id' => $id])->render($this->view . '.index');

    }
}
