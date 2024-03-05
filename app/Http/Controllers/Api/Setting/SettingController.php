<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SettingResource;
use App\Models\Setting\Setting;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiTrait;
    public function fetch_settings()
    {
        try {
            $settings = Setting::first();
            return $this->dataResponse('Settings fetched successfully', new SettingResource($settings), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
