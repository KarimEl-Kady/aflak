<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Message\StoreRequest;
use App\Models\Message\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function send_message(StoreRequest $request){
        $data=[];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        Message::create($data);

        return redirect()->back()->with(['success' => 'messages.send']);
    }
}
