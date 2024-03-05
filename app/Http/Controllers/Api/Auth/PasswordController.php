<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    //
    use ApiTrait;
    public function change_password(Request $request){
        try{
            $rules =[
                "old_password"=>'required|min:8',
                "new_password"=>'required|min:8',
                'new_confirm_password' => 'required|same:new_password'
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $this->getValidationErrors($validator);
            }
            $user = auth()->user();
            // dd('add');

            if ($user && Hash::check($request->old_password, auth()->user()->password)){
              $user->update([
                    "password"=> Hash::make($request->new_password)
                ]);
                $msg = __('message.password has been changed successfully');
                return $this->dataResponse($msg , new UserResource($user) , 200);
            }
            else{
                $msg = __('message.old password not matches the password');
                return $this->errorResponse($msg,401);
            }
        } catch (\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }

    public function reset_password(Request $request){
        try{
            $rules=[
                "email" => 'required',
                "password" => 'required|min:8',
            ];
            $validator = Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $this->getValidationErrors($validator);
            }
            $user = User::whereEmail($request->email)->first();
            if(!$user){ // if the user exist wrong email or not registered before
                $msg = __('message.Sorry, this user does not exist');
                return $this->errorResponse($msg , 200);
            }

            $user->update([
                "password"=> Hash::make($request->password),
            ]);
            $msg = __('message.password has been changed successfully');
            return $this->dataResponse($msg , new UserResource($user) , 200);

        } catch (\Exception $ex){
          return $this->returnException($ex->getMessage(),500);
      }

    }
}
