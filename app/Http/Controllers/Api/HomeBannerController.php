<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeBannerResource;
use App\Models\HomeBanner\HomeBanner;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    //
    use ApiTrait;
    public function fetch_home_banner(){
        try{
            $user = auth()->user();
            $home_banner=HomeBanner::get();
            $msg = __('fetch_home_banner');
            $data = HomeBannerResource::collection($home_banner);
            return $this->dataResponse($msg , $data , 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
