<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OfferResource;
use App\Http\Resources\Api\RequestResource;
use App\Http\Resources\Api\UserResource;
use App\Http\Services\ApiMethodsService;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelTranslation;
use App\Models\Offer\Offer;
use App\Models\Request\Request as RequestRequest;
use App\Models\Request\RequestRoom;
use App\Notification\SendNotification;
use App\Traits\ApiTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RequestController extends Controller
{
    //
    use ApiTrait;
    protected $apiService;

    public function add_request(Request $request)
    {
        // try {

            $rules = [
                "hotel_id" => "required",
                // "hotel_name" => "required",
                // "hotel_address" => "sometimes",
                // "count_persons" =>"required",
                // "count_rooms" =>"required",
                "checkin" => "required|date",
                "checkout" => "required|date",
                "rooms" => "required|array",
                "rooms.*.room_id" => "required",
                "rooms.*.room_name" => "required",
                "rooms.*.room_count" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();


            $hotelController = new HotelController(new ApiMethodsService());
            $hotelController->fetch_hotel_details($request);

                //storing the datails that existed in database from fetch_hotel_details

            $hotel_id =Hotel::where('ex_id', $request->hotel_id)->pluck("id")->first();
            $hotel_name = HotelTranslation::where('hotel_id',$hotel_id)->value('name');
            $hotel_address = HotelTranslation::where('hotel_id',$hotel_id)->pluck("country")->first() .', '. HotelTranslation::where('hotel_id',$hotel_id)->pluck("city")->first();


            if($request->checkin >= (now()->subDay()) && $request->checkout > $request->checkin){
                if($request->checkin == (now()->subDay())){
                $remain_time = (strtotime($request->checkin)-strtotime(now()->isNextDay()))/ 60;
                }else{
                $remain_time = (abs(strtotime($request->checkin)-strtotime(now()))/ 60);
            }
                $data = RequestRequest::create([
                    'hotel_id' => $request->hotel_id,
                    'hotel_name' => $hotel_name,
                    'hotel_address' => $hotel_address,
                    // 'count_persons' => $request->count_persons,
                    // 'count_rooms' => $request->count_rooms,
                    'checkin' => $request->checkin,
                    'checkout' => $request->checkout,
                    'user_id' => auth()->id(),
                    'remaining_time' => $remain_time,
                ]);

                // DB::table('offers')->update(['remain_time' => $remain_time]);


            if ($request->has('rooms') && is_array($request->rooms)) {
                foreach ($request->rooms as $room) {

                    $room_id = $room['room_id']; // Change 'image' to 'images'
                    $room_name = $room['room_name'];
                    $room_count = $room['room_count'];

                    $user_image_data['room_id'] = $room_id;
                    $user_image_data['room_name'] = $room_name;
                    $user_image_data['request_id'] = $data->id;
                    $user_image_data['room_count'] = $room_count;

                    RequestRoom::create($user_image_data);
                }
            }
            // $restusers= !(auth()->user()->id);
            // Notification::send($restusers,'a request is added',new RequestResource() );


            $msg = __("message. request added successfully");
            return $this->dataResponse($msg, new RequestResource($data), 200);
        }else{
            $msg = 'wrong checkin date or checkout date entered';
            return $this->errorResponse($msg , 401);
        }
        // } catch (\Exception $ex) {
        //     return $this->returnException($ex->getMessage(), 500);
        // }
    }

    public function fetch_my_requests()
    {

        try {
            $user = auth()->user();
            // dd($user);
            $myreqs = RequestRequest::where('user_id', '=', $user->id)->get();
            $data = (RequestResource::collection($myreqs));
            $msg = "fetch_my_requests";

            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_my_offered_requests()
    {
        try {
            $user = auth()->user();

            $myreqs = RequestRequest::where('user_id', '=', $user->id)->get();
            $allmyreqs = $myreqs->where('offer_sit', '=', 1);

            $data = (RequestResource::collection($allmyreqs));

            $msg = __('offered requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }




    public function fetch_request_replies(Request $request)
    {
        try {
            $rules = [
                "request_id" => "required|exists:requests,id",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = auth()->user();
            $offers = Offer::where('request_id', $request->request_id)->get();

            $data = OfferResource::collection($offers);
            // {
            //     $offerResource['remain_time'] = $offerResource->calculateRemainingTime();
            //     return $offerResource;
            // });

            $msg = "fetch_request_replies";

            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
