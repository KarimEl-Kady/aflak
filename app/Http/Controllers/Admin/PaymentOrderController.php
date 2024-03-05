<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PaymentOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\PaymentWay\PaymentOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentOrderController extends Controller
{
    //
    protected $view = 'admin_dashboard.payment_orders.';
    protected $route = 'payment_orders.';

    public function index(PaymentOrderDataTable $dataTable)
    {
        return $dataTable->render($this->view . 'index');
    }

    public function accept_orders(Request $request)
{
    try {
        // Validate request
        $request->validate([
            'id' => 'required|exists:payment_orders,id',
        ]);

        // Begin transaction to opreate updates on data
        DB::beginTransaction();

        // Get user and order details
        $paymentOrder = PaymentOrder::find($request->id);
        $user = User::find($paymentOrder->user_id);
        $orderBalance = $paymentOrder->oreder_balance;

        // Update user balance
        $charged_balance = $user->balance + $orderBalance;
        $user->update(['balance' => $charged_balance]);

        // Delete the order from table
        $paymentOrder->delete();

        // Commit the transaction
        DB::commit();

        return response()->json(['status' => true]);
    } catch (\Exception $ex) {
        DB::rollback();
        return response()->json(['status' => false, 'error' => $ex->getMessage()]);
    }
}


    public function refuse_orders(Request $request)
    {         //delteing the order from the table
        PaymentOrder::destroy($request->id);

        return response()->json(['status' => true]);
    }
}

