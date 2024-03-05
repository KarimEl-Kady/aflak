<?php

namespace App\Http\Controllers\Admin\Contract;

use App\Http\Controllers\Controller;
use App\Models\Contract\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{

    protected $view = 'admin_dashboard.Contract.';
    protected $route = 'settings.';

    public function index()
    {
        $contract = Contract::firstOrNew();
        return view($this->view . 'index', compact('contract'));
    }
    public function update(Request $request)
    {
        $contract = Contract::firstOrCreate();

        $pdf = upload_pdf($request->pdf, 'contracts');

        $data['pdf'] = $pdf;

        $contract->update($data);
        return redirect()->back()
            ->with(['success' => __("messages.editmessage")]);
    }
}
