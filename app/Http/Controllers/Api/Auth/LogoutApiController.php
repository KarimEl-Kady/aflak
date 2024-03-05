<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LogoutApiRequest;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogoutApiController extends Controller
{

    use ApiTrait;
    public function logout(LogoutApiRequest $request)
    {
        try { DB::beginTransaction();
            $user = User::findorfail(Auth::guard('api')->id());
            // $user->update([
            //     'api_token' => null
            // ]);

            $user->user_devices()->where('device_token', $request->device_token)->get()->map(function ($device) {
                $device->delete();
            });
            // ->updateOrCreate([], [
            //     'device_token' => null
            // ]);
            DB::commit();
            $message = __("messages.logout successfully");
            return $this->successResponse($message, 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->errorResponse($th->getMessage(), 500);
        }
    }
}//End of class
