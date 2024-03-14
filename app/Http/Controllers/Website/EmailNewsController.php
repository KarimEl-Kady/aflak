<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\EmailNews\StoreRequest;
use App\Models\NewsEmail\NewsEmail;
use Illuminate\Http\Request;

class EmailNewsController extends Controller
{
    //
    public function send_email(StoreRequest $request){
        $data=[];
        $data['email'] = $request->email;

        NewsEmail::create($data);

        return redirect()->back()->with(['success' => 'messages.send']);
    }
}
