<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorldTerm\WorldTerm;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class WorldTermController extends Controller
{
    //
    use ApiTrait;

    public function fetch_wallet_term(){
        try{


            $term = WorldTerm::firstOrNew();

            //response
            $data =  $term->text ?? '';

            $msg = "fetch_wallet_term";

            return $this->dataResponse($msg, $data,200);

        } catch (\Exception$ex) {
            return $this->returnException($ex->getMessage(), 500);
        }

    }

}
