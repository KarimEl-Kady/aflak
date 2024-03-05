<?php

namespace App\Http\Controllers\Api;

use App\Helpers\PostsPermission;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AcceptedOfferResource;
use App\Http\Resources\Api\OfferAcceptedResource;
use App\Http\Resources\Api\OfferResource;
use App\Http\Resources\Api\RequestResource;
use App\Models\Offer\Offer;
use App\Models\Offer\OfferService;
use App\Models\Request\Request as RequestRequest;
use App\Models;
use App\Models\Offer\OfferAsset;
use App\Models\Setting\Setting;
use App\Models\User;
use App\Notification\SendNotification;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    //
    use ApiTrait;
    public function add_offer(Request $request)
    {
        try {
            $rules = [
                "request_id" => "required|exists:requests,id",
                "price" => "required",
                "describtion" => "required",
                "services" => "required|array",
                "expired_at" => "required|date",
                "offer_sit" => "sometimes",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->getvalidationErrors($validator);
            }
            $requested_user = RequestRequest::whereId($request->request_id)->get('user_id')->first();
            // dd($requested_user);
            $user_request = RequestRequest::whereId($request->request_id)->first();
            if ($user_request->user_id != auth()->id()) {
                $data['request_id'] = $request->request_id;
            } else {
                $msg = __("message. there is no request with this id");
                return $this->errorResponse($msg, 401);
            }
            $data['describtion'] = $request->describtion;
            $data['expired_at'] = $request->expired_at;
            $data['price'] = $request->price;
            $data['user_id'] = auth()->id();

            $data_offers = Offer::create($data);

            //make an instance of user and git the auth user
            $authUser = User::findOrFail(auth()->id());
            // make an instance of setting and get the setting
            $setting = Setting::first();
            $points = $setting?->points;
            // make an instance of PostsPermission and add the points
            $removePoint = new PostsPermission();
            $point = $removePoint->addPoints($points);
            // update the points
            $authUser->points = $point;
            $authUser->save();


            $requestRequest = RequestRequest::where('id', $request->request_id)->first();
            // dd($requestRequest);
            if ($requestRequest) {
                $requestRequest->update(['offer_sit' => $request->offer_sit]);
                // Notification::send($requested_user , 'an offer is added for your request' , new OfferResource($data_offers));
            }



            foreach ($request->services as $service) {
                $service_data['title'] = $service;
                $service_data['offer_id'] = $data_offers->id;
                OfferService::create($service_data);
            }
            $msg = __("message. done adding your offer for the request");
            return $this->dataResponse($msg, new OfferResource($data_offers), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_unoffered_request()
    {
        try {

            // user unoffered request
            $user = auth()->user();
            $unofferedRequests = RequestRequest::where('offer_sit', 0)->where('user_id', '!=', $user->id)->get();

            if ($unofferedRequests->isEmpty()) {
                $msg = __('No unoffered requests found.');
                return $this->dataResponse($msg, [], 200);
            }


            $data = (RequestResource::collection($unofferedRequests))->toArray(request());
            // {
            // $data['remain_time'] = RequestResource::calculateRemainingTime();
            // return $ $data['remain_time'];
            // }
            $msg = __('Unoffered requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_offered_requests()
    {
        try {
            $user = auth()->user();

            // for user 's offered requests
            $alloffers = Offer::where('user_id', '=', $user->id)->get();
            $offeredRequestIds = $alloffers->pluck('request_id')->toArray();

            // Fetch the actual offered requests based on the IDs
            $offeredRequests = RequestRequest::whereIn('id', $offeredRequestIds)
                ->where('offer_sit', 1)
                ->where('user_id', '!=', $user->id)
                ->get();

            if ($offeredRequests->isEmpty()) {
                $msg = __('No offered requests found.');
                return $this->dataResponse($msg, [], 200);
            }

            $data = (AcceptedOfferResource::collection($offeredRequests))->toArray(request());

            $msg = __('offered requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_all_offered()
    {
        try {
            $user = auth()->user();

            // for all another users' offered requests
            $alloffered = RequestRequest::where('offer_sit', 1)->where('user_id', '!=', $user->id)->get();

            if ($alloffered->isEmpty()) {
                $msg = __('No offered requests found.');
                return $this->dataResponse($msg, [], 200);
            }

            $data = (RequestResource::collection($alloffered))->toArray(request());

            $msg = __('offered requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }


    public function fetch_cancelled_requests()
    {
        try {
            $user = auth()->user();

            // for offered requests
            $cancelledRequests = RequestRequest::where('user_id' , $user->id)->where('checkin','<',now()->subDay())->get();
            $cancelledRequestsids = $cancelledRequests->pluck('id')->toArray();

            DB::table('requests')->whereIn('id', $cancelledRequestsids)->update(['offer_sit' => 2]);

            if ($cancelledRequests->isEmpty()) {
                $msg = __('No cancelled requests found.');
                return $this->dataResponse($msg, [], 200);
            }

            $data = (RequestResource::collection($cancelledRequests))->toArray(request());

            $msg = __('Cancelled requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_accepted_offers()
    {
        try {
            $user = auth()->user();

            // for offered requests
            $acceptedRequests = RequestRequest::where('offer_sit', 3)->where('user_id', '=', $user->id)->get();

            if ($acceptedRequests->isEmpty()) {
                $msg = __('No offered requests found.');
                return $this->dataResponse($msg, [], 200);
            }

            $data = (OfferAcceptedResource::collection($acceptedRequests))->toArray(request());

            $msg = __('offered requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }


    public function fetch_rest_requests()
    {
        try {
            $user = auth()->user();

            // Get the IDs of requests the user has offered
            $offeredRequestIds = Offer::where('user_id', $user->id)->pluck('request_id')->toArray();

            // Fetch requests that the user has not offered
            $acceptedRequests = RequestRequest::whereNotIn('id', $offeredRequestIds)
                ->whereNot('offer_sit', 3)
                ->where('user_id', '!=', $user->id)
                ->get();

            if ($acceptedRequests->isEmpty()) {
                $msg = __('No requests found.');
                return $this->dataResponse($msg, [], 200);
            }

            $data = (RequestResource::collection($acceptedRequests))->toArray(request());

            $msg = __('Requests fetched successfully');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_all_accepted()
    {
        try {

            $user = auth()->user();
            $allmyreqs = RequestRequest::where('user_id', '!=', $user->id)->where('offer_sit',3)->get();
            $alloffers = Offer::where('user_id', '=', $user->id)->get();

            $requestIdsWithOffers = $alloffers->pluck('request_id')->toArray();

            $requestsForOtherUsersWithOffers = $allmyreqs->filter(function ($request) use ($requestIdsWithOffers) {
                return in_array($request->id, $requestIdsWithOffers);
            });

            // $allacceptedreqs = $allmyreqs->flatMap->offers('offer_sit', 3);

            // dd($allacceptedreqs);

            $data = AcceptedOfferResource::collection($requestsForOtherUsersWithOffers);
            $msg = __('fetch all accepted requests');
            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 500);
        }
    }


    public function add_offer_asset(Request $request)
    {
        try {
            $rules = [
                "offer_id" => "required|exists:offers,id",
                "asset" => "required|array",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->getValidationErrors($validator);
            }

            foreach ($request->asset as $one) {
                $one = upload_pdf($one , 'offers');
                $data['asset'] = $one;
                $data['offer_id'] = $request->offer_id;
                OfferAsset::create($data);
            }




            $msg = 'add_offer_asset';
            return $this->successResponse($msg, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function accept_offer(Request $request)
    {
        try {
            $rules = [
                "request_id" => "required",
                "offer_id" => "required",
                "wallet_password" => "required",
            ];
            // dd($request->wallet_password);

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->getValidationErrors($validator);
            }

            $user = auth()->user();
            $requestId = $request->request_id;
            $offerId = $request->offer_id;
            $offered_user = Offer::whereId($offerId)->get('user_id')->first();

            $alloffersids = Offer::where('request_id' , $requestId)->pluck('id')->toArray();
            $isValidOffer = $user->requests()
                ->where('offer_sit',1)
                ->where('id', $requestId)
                ->whereHas('offers', function ($query) use ($offerId) {
                    $query->where('id', $offerId);
                })
                ->exists();

            $isValidOff = $user->requests()
                ->where('offer_sit',3)
                ->where('id', $requestId)
                ->whereHas('offers', function ($query) use ($offerId) {
                    $query->where('id', $offerId);
                })
                ->exists();
                // dd($user->wallet_password);
                if (Hash::check($request->wallet_password , $user->wallet_password)){
            if ($isValidOff) {
                $msg = __("message. offer accepted already before");
                return $this->successResponse($msg, 200);
            }

            // dd($isValidOffer);
            if ($isValidOffer) {
                $user->requests()
                    ->where('id', $requestId)
                    ->whereHas('offers', function ($query) use ($offerId) {
                        $query->where('id', $offerId);
                    })
                    ->update(['offer_sit' => 3]);
                    //updating the chosen offer to accepted
                    DB::table('offers')->where('id', $offerId)->update(['status'=> config('project_types.offer_status.accepted')]);
                    //updating the rest offers to refused
                    DB::table('offers')->whereIn('id', $alloffersids)->where('id', '!=' , $offerId)->update(['status'=> config('project_types.offer_status.refused')]);

                // dd($isValidOffer);
                // notification will be sent to the offered user to that the offer is accepted
                // Notification::send($offered_user , 'your offer is accepted' , AcceptedOfferResource::collection($offerId));
                $msg = __("message. offer accepted successfully");
                return $this->successResponse($msg, 200);
            } else {
                $msg = __("message. an error is happened");
                return $this->errorResponse($msg, 500);
            }
        }else{
            $msg = __("message. wrong wallet password");
                return $this->errorResponse($msg, 200);
        }
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
