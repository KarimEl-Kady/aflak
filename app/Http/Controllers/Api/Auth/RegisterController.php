<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models;
use App\Models\User;
use App\Traits\ApiTrait;
use EmailSenderTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller

{
    //
    use ApiTrait;
    public function register(Request $request)
    {

        try {
            $rules = [
                "email" => "required|unique:users,email",
                "phone" => "required|unique:users,phone",
                "password" => 'required|min:8',
                "device_token" => 'sometimes',

                // "email_verifiy" => "required|integer",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->getvalidationErrors($validator);
            }

            DB::beginTransaction();
            $data["email"] = $request->email;
            $data["phone"] = $request->phone;
            $data["password"] = Hash::make($request->password);   //hashing the password
            $data['verfication_code'] = 12345;
            $data["api_token"] = Hash::make(rand(100, 55415415415));

            $user = User::create($data);
            //dd($user);
            if($request->device_token){
            $user->user_device()->firstOrCreate([
                'device_token' => $request->device_token,
                'device_type' => $request->device_type,
                'device_id' => $request->device_id,
            ]);
            }
            // EmailSenderHelper::getInstance()->sendEmail(
            //     email:$request->email,
            //     subject:__("message.verification code"),
            //     message:__("message.verification code")." ".$data['verfication_code']
            // );

            DB::commit();
            $msg = __("message.saved successfully");

            return $this->dataResponse($msg, new UserResource($user), 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function token_invalid()
    {
        $msg = __("message.please login");
        return $this->errorResponse($msg, 401);
    }
}
