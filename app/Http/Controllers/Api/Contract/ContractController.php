<?php

namespace App\Http\Controllers\Api\Contract;

use App\Http\Controllers\Controller;
use App\Models\Contract\Contract;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    use ApiTrait;
    public function fetch_contract_file()
    {
        try {
            $contract = Contract::firstOrNew();

            $data =  $contract->pdf_link  ?? '';

            $msg = "fetch_contract_file";

            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
