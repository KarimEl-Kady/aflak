<?php

namespace App\Helpers;

use App\Models\User\UserPoint;
use App\Traits\ApiTrait;

class PostsPermission
{

    use ApiTrait;
    public  function deductPoints($points)
    {
        $authUserPoints = auth()->user()->points;
        $newPoint = $authUserPoints - $points;

        $user_point = UserPoint::create([
            "user_id" => auth()->id(),
            "points" => $points,
            "type" => 2,
            "title" => "Point Deducted",
        ]);

        return $newPoint;
    }

    public  function addPoints($points)
    {
        $authUserPoints = auth()->user()->points;

        $user_point = UserPoint::create([
            "user_id" => auth()->id(),
            "points" => $points,
            "type" => 1,
            "title" => " point Added",
        ]);
        $newPoint = $authUserPoints + $points;
        return $newPoint;
    }
}
