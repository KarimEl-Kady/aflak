<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UpgrateDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UpgrateController extends Controller
{
    //
    protected $view = 'admin_dashboard.upgrates.';
    protected $route = 'upgrates.';

    public function index(UpgrateDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

    public function accept_upgrates(Request $request)
    {
        $refuse = User::find($request->user_id);
        if ($refuse) {
            $refuse->update([
                'status' => config('project_types.users_status.accept')]
            );
        }

        return response()->json(['status' => true]);
    }

    public function refuse_upgrates(Request $request)
    {
        $refuse = User::find($request->user_id);
        if ($refuse) {
            $refuse->update([
                'status' => config('project_types.users_status.refuse')]
            );
        }

        return response()->json(['status' => true]);
    }
}
