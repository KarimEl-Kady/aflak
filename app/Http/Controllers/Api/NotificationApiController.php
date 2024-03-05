<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\NotificationResource;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class NotificationApiController extends Controller
{
    use ApiTrait;

    public function fetch_notifictions() {

        try {
            $notifications = auth('api')->user()->notifications()->get();
            $message = __("messages.notifications fetched successfully");
            $response = NotificationResource::collection($notifications);
            return $this->dataResponse(msg:$message ,data:$response);
        } catch (\Throwable $th) {
            return $this->errorResponse(msg:$th->getMessage(), code:500);
        }
    }
}//End of class
