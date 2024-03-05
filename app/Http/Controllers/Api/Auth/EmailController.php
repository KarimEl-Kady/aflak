<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    //
    use ApiTrait;
    public function check_email(Request $request){
        try{
            $rules =[ "email",];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return $this->getvalidationErrors($validator);
            }

            $user = User::whereEmail($request->email)->first();
            if (!$user) {
                $msg = __('messages.Sorry, this user does not exist');
                return $this->dataResponse($msg,false, 200);
            }

            elseif ($user) {
                $msg = __('messages.The user was found successfully');
                return $this->dataResponse($msg,true, 200);
        }
    }catch(\Exception $ex){
            return $this->errorResponse($ex,500);
        }
    }
}
