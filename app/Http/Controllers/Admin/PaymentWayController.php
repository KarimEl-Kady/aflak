<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PaymentWayDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentWay\StoreRequest;
use App\Http\Requests\Admin\PaymentWay\UpdateRequest;
use App\Models\PaymentWay\PaymentWay;
use Illuminate\Http\Request;

class PaymentWayController extends Controller
{
    //
    protected $view = 'admin_dashboard.payment_ways.';
    protected $route = 'payment_ways.';

    public function index(PaymentWayDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreRequest $request)
    {

        // $data = $request->validated();

        $data["title"] = $request->title;
        $data["sub_title"] = $request->sub_title;
        $data["type"] = $request->type;
        if ($request->hasFile('image')) {
            $data["image"] = upload_image($request->image, "payment_ways");
        }
        PaymentWay::create($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.createmessage")]);
    }

    public function edit($id)
    {
        $payment_way = PaymentWay::findOrFail($id);

        return view($this->view . 'edit', compact('payment_way'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $payment_way = PaymentWay::whereId($id)->first();

        $data["title"] = $request->title;
        $data["sub_title"] = $request->sub_title;
        $data["type"] = $request->type;

        if ($request->hasFile('image')) {
            delete_image($payment_way->image);
            $data["image"] = upload_image($request->image, "payment_ways");
        }


        $payment_way->update($data);

        return redirect()->route($this->route . "index")
            ->with(['success' => __("messages.editmessage")]);
    }

    public function destroy($id)
    {
        $payment_way = PaymentWay::find($id);

        if (!$payment_way) {
            return response()->json(['status' => false]);
        }

        delete_image($payment_way->image);

        $payment_way->delete();

        return response()->json(['status' => true]);
    }
}
