<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PointHistoryResource;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\Api\WalletHistoryResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User\UserPoint;
use App\Models\User\UserWallet;

class UserController extends Controller
{
    //
    use ApiTrait;
    public function set_company_data(Request $request)
    {
        try {
            $rules = [
                "image" => "sometimes|image",
                "company_name" => "required",
                "company_address" => "required",
                "company_website" => "sometimes",
                "commercial_register_number" => "required",
                "tax_number" => "required",

            ];
            $vlidator = Validator::make($request->all(), $rules);
            if ($vlidator->fails()) {
                return $this->getvalidationErrors($vlidator);
            }
            $user = auth()->user();

            $data['id'] = $user->id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                // $imagePath = $image->store('user_images', 'public'); // Store the image in the 'public/user_images' directory
                $data['image'] = upload_image($request->image, "users");
            }
            // $data['image'] = $request->image;


            $data['company_name'] = $request->company_name;
            $data['company_address'] = $request->company_address;
            $data['company_website'] = $request->company_website;
            $data['commercial_register_number'] = $request->commercial_register_number;
            $data['tax_number'] = $request->tax_number;


            $user->update($data);
            // dd($user_data);
            //   dd($user);

            $msg = "your company data is set successfully";
            return $this->dataResponse($msg, new UserResource($user), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function contract_signing(Request $request)
    {
        try {
            //validation
            $rules = [
                "signature_image" => "sometimes|image",
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }

            $user = auth()->user();

            $user->update([
                'signature_image' => upload_image($request->signature_image, "users"),
                'status' => config('project_types.users_status.contract'),
            ]);
            // $data['signature_image'] = upload_image($request->signature_image, "users");
            // $data['status'] = config('project_types.users_status.contract');

            // $user->update($data);
            $msg = __("messages.save successful");

            return $this->dataResponse($msg, new UserResource($user), 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_point_histories()
    {
        try {

            $histories = UserPoint::whereUserId(auth()->id())->get();

            $data = PointHistoryResource::collection($histories);

            $msg = "fetch_point_histories";

            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_wallet_histories()
    {
        try {
            $histories = UserWallet::whereUserId(auth()->id())->get();

            $data = WalletHistoryResource::collection($histories);

            $msg = "fetch_wallet_histories";

            return $this->dataResponse($msg, $data, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_point_value()
    {
        try {
            $user = auth()->user();


            $msg = "fetch_point_value";

            return $this->dataResponse($msg, strval($user->points) ?? '', 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function fetch_wallet_value()
    {
        try {
            $user = auth()->user();


            $msg = "fetch_wallet_value";

            return $this->dataResponse($msg, strval($user->balance) ?? '', 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function add_points(Request $request)
    {

        try {
            $rules = [
                "points" => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            $user = User::find(auth()->id());

            $user->update([
                "points" => $user->points ? $user->points + $request->points : $request->points
            ]);
            $msg = 'Points Added successfully';
            return $this->successResponse($msg, 200);
        } catch (\Exception $ex) {
            return $this->returnException($ex->getMessage(), 500);
        }
    }
}
