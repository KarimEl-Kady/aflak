<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountApiController extends Controller
{
    use ApiTrait;

    public function delete_account(){
        try {
            $user = User::findorfail(Auth::guard('api')->id());
            $user->delete();
            $message = __("messages.account deleted successfully");
            return $this->successResponse($message, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }
}//End of class
