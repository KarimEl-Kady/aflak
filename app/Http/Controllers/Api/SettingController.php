<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeKeyResource;
use App\Models\Setting\Setting;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    use ApiTrait;
    public function fetch_home_keys(){
        try{
        $user = auth()->user();
        $settingdata = Setting::first();

        $data['points'] =$settingdata->points ;
        $data['post_points'] =$settingdata->post_points ;
        $data['value_of_upgrate'] =intval($settingdata->value_of_upgrate) ;
        $data['status'] =$user->status ;
        $data['user_points'] =$user->points ;

        $msg = "fetch_home_key";
        return $this->dataResponse($msg , $data , 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }
}
