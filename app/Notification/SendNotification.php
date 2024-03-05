<?php

namespace App\Notification;


use App\Http\Resources\UserResource;
use App\Notification\Constants;

class SendNotification
{

    private static $URL = "https://fcm.googleapis.com/fcm/send";



    public static function send($token, $title, $text, $image=null ,$type="general" ,$user =null)
    {

        $data = [
            "to" => $token,
            "data" => [
                "title" => $title,
                'body' => $text,
                "image" => $image,
                "type" => $type,
                // "user" => $user != null ?  new UserResource($user) : null,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            ],
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . Constants::NOTIFICATION_KEY,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $result = curl_exec($ch);
        return true;
    }
}//End of service
