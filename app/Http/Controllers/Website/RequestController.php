<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Request\StoreRequest;
use App\Models\Request\Request ;

class RequestController extends Controller
{
    //
    public function send_request(StoreRequest $request){
        $data=[];
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['phone']= $request->phone;
        $data['fright_type'] = $request->type;
        $data['load']   = $request->load;



        Request::create($data);

        return redirect()->back()->with(['success' => 'messages.send']);
    }
}
