<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\WalletHistoryResource;
use App\Models\PaymentWay\Payment;
use App\Models\PaymentWay\PaymentOrder;
use App\Models\Setting\Setting;
use App\Models\User\UserWallet;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Validator;
class WalletController extends Controller
{
    use ApiTrait;
    public function set_wallet_password(Request $request)
    {
        try {
            $rules = [
                "wallet_password" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();


            $data['wallet_password'] =  Hash::make($request->wallet_password);

            $user->update($data);

            $msg = "set_wallet_password";
            return $this->dataResponse($msg, new UserResource($user), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function check_wallet_password(Request $request)
    {
        try {
            $rules = [
                "wallet_password" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();

            if (Hash::check($request->wallet_password, auth()->user()->wallet_password)) {
                $msg = "wallet password correct";
                return $this->successResponse($msg, 200);
            } else {
                $msg = "wallet password invalid";
                return $this->errorResponse($msg, 200);
            }
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }


    public function update_wallet_password(Request $request)
    {
        try {
            $rules = [
                "password" => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();

            $user->update([
                "wallet_password" => Hash::make($request->password)
            ]);
            $msg = __('message.wallet_password has been updated successfully');
            return $this->dataResponse($msg, new UserResource($user), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function charge_wallet(Request $request)
    {
        try {
            $rules = [
                "balance" => 'required',
                "payment_id" => 'required',
                "receipt_image" => 'sometimes',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();

            // $user->update([
            //     "balance" => $user->balance ? $user->balance + $request->balance : $request->balance
            // ]);

            // foreach ($request->payment_id as $pay) {
            //     $pay = upload_image($pay, 'payments');
            //     $data['receipt_image'] = $pay;
            //     $data['payment_id'] = $request->payment_id;
            //     Payment::create($data);
            // }
            $img = null;

            if ($request->hasFile('receipt_image')) {
                $img = upload_image($request->receipt_image, "payments");
            }

            PaymentOrder::create([
                "user_id" => $user->id ,
                "order_receipt_image" => $img,
                "oreder_balance" => $request->balance,
            ]);

            $user_wallet = UserWallet::create([
                'title' => 'wallet charget',
                'balance' => $request->balance,
                'payment_id' => $request->payment_id,
                'type' => 1,
                'user_id' => auth()->id(),
                'receipt_image' => $img,
            ]);

            $msg = 'charge_wallet';
            return $this->dataResponse($msg, new WalletHistoryResource($user_wallet), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
    public function upgrade_status(Request $request)
    {
        try {
        $rules = [
            "wallet_password" => "required",
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return $this->getvalidationErrors($validator);
        }
        $user = auth()->user();
        $setting = Setting::first();

        if (!$user->signature_image) {
            return $this->errorResponse("there's no signature image", 200);
        }
        if (!Hash::check($request->wallet_password, $user->wallet_password)) {
            return $this->errorResponse("wallet password is wrong", 200);
        }
        if (!$setting || $setting->value_of_upgrate == null) {
            return $this->errorResponse("you can't upgrate now", 200);
        }
        if ($setting->value_of_upgrate  >  $user->balance) {
            return $this->errorResponse("no enough balance", 200);
        }

        $user->update([
            'balance' => $user->balance - $setting->value_of_upgrate,
            'status' => config('project_types.users_status.pending'),

        ]);
        $msg = "upgrade status is done";
        $data = new UserResource($user);
        return $this->dataResponse($msg, $data, 200);

        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
