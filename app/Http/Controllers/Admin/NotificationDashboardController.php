<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notifications\StoreNotificationRequest;
use App\Models\Notification\Notification;
use App\Models\User;
use App\Notification\SendNotification;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NotificationDashboardController extends Controller
{

    protected $view = 'admin_dashboard.notifications.';
    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreNotificationRequest $request)
    {
        $data = $request->validated();
        $data['type'] = config("project_types.notification_types.general");

        $Notification = Notification::create($data);

        $users = User::whereHas('user_devices', function ($device_q) {
            $device_q->whereNotNull('device_token');
        })->get();

        $this->sendNotificationBasedOnDevice(users: $users, data: $Notification, is_one_device: false);
        foreach($users as $user){
            $user->notifications()->attach($Notification);
        }

        return redirect()->route('notifications.create')->with(['success' => __('messages.createmessage')]);
    }

    protected function sendNotificationBasedOnDevice($users, $data, $is_one_device = false)
    {
        foreach ($users as $key => $user) {
            if ($is_one_device) {
                $user_token = $user->user_device->device_token;
                SendNotification::send(
                    token: $user_token,
                    title: $data['title'],
                    text: $data['text'],
                    image: $data['imageLink'],
                );
            } else {
                // $user_devices = $user->user_devices()->where('device_token', '!=', null)->get();
                $user_devices = $user->user_devices;
                foreach ($user_devices as $key => $device) {
                    SendNotification::send(
                        token: $device->device_token,
                        title: $data['title'],
                        text: $data['text'],
                        image: $data['imageLink'],
                    );
                }
            }
        }
    }
}//End of class
