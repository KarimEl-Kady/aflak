<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PaymentWayResource;
use App\Models\PaymentWay\PaymentWay;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class PaymentWayController extends Controller
{
    //
    use ApiTrait;
    public function fetch_payment_ways(){
        try{

            $paymentways=PaymentWay::get();
            $msg = __('fetch_payment_ways');
            $data = PaymentWayResource::collection($paymentways);
            return $this->dataResponse($msg , $data , 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
