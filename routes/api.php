<?php


use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Api\Auth\CheckCodeController;
use App\Http\Controllers\Api\Auth\EmailController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutApiController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Contract\ContractController;
use App\Http\Controllers\Api\HomeBannerController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\NotificationApiController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\PaymentWayController;
use App\Http\Controllers\Api\Post\CommentController;
use App\Http\Controllers\Api\Post\PostController;
use App\Http\Controllers\Api\PrivacyController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\Setting\SettingController;
use App\Http\Controllers\Api\SettingController as ApiSettingController;
use App\Http\Controllers\Api\TermController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\WorldTermController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::group(['middleware' => 'auth:api'], function () {

//register
Route::post("register", [RegisterController::class, "register"]);

//login
Route::post("login", [LoginController::class, "login"]);

//token_invalid
Route::get("token_invalid", [RegisterController::class, "token_invalid"])->name('token_invalid');


//check_email
Route::post("check_email", [EmailController::class, "check_email"]);

//reset_password
Route::post("reset_password", [PasswordController::class, "reset_password"]);



//check_code
// Route::post("check_code", [AuthCheckCodeController::class, "check_code"]);



//});


//check_code
Route::post("check_code", [CheckCodeController::class, "check_code"]);


Route::group(['middleware' => 'auth:api'], function () {

    //change_password
    Route::post("change_password", [PasswordController::class, "change_password"]);

    //add_request
    Route::post("add_request", [RequestController::class, "add_request"]);

    //add_offer
    Route::post("add_offer", [OfferController::class, "add_offer"]);

    //add_offer_asset
    Route::post("add_offer_asset", [OfferController::class, "add_offer_asset"]);


    //fetch_my_requests
    Route::get("fetch_my_requests", [RequestController::class, "fetch_my_requests"]);

    //fetch_request_replies
    Route::post("fetch_request_replies", [RequestController::class, "fetch_request_replies"]);


    //fetch_unoffered_request
    Route::get("fetch_unoffered_request", [OfferController::class, "fetch_unoffered_request"]);

    //fetch_payment_ways
    Route::get("fetch_payment_ways", [PaymentWayController::class, "fetch_payment_ways"]);

    //fetch_offered_requests
    Route::get("fetch_offered_requests", [OfferController::class, "fetch_offered_requests"]);

    //fetch_cancelled_requests
    Route::get("fetch_cancelled_requests", [OfferController::class, "fetch_cancelled_requests"]);

    //set_company_data
    Route::post("set_company_data", [UserController::class, "set_company_data"]);

    //contract_signing
    Route::post("contract_signing", [UserController::class, "contract_signing"]);

    //set_wallet_password
    Route::post("set_wallet_password", [WalletController::class, "set_wallet_password"]);

    //check_wallet_password
    Route::post("check_wallet_password", [WalletController::class, "check_wallet_password"]);

    //update_wallet_password
    Route::post("update_wallet_password", [WalletController::class, "update_wallet_password"]);

    //fetch_accepted_offers
    Route::get("fetch_accepted_offers", [OfferController::class, "fetch_accepted_offers"]);

    //fetch_all_accepted
    Route::get("fetch_all_accepted", [OfferController::class, "fetch_all_accepted"]);

    //fetch_all_offered
    Route::get("fetch_all_offered", [OfferController::class, "fetch_all_offered"]);

    //fetch_privacy
    Route::get("fetch_privacy", [PrivacyController::class, "fetch_privacy"]);

    //fetch_term
    Route::get("fetch_term", [TermController::class, "fetch_term"]);

    //fetch_wallet_term
    Route::get("fetch_wallet_term", [WorldTermController::class, "fetch_wallet_term"]);

    //fetch_rest_requests
    Route::get("fetch_rest_requests", [OfferController::class, "fetch_rest_requests"]);

    //fetch_my_offered_requests
    Route::get("fetch_my_offered_requests", [RequestController::class, "fetch_my_offered_requests"]);

    //accept_offer
    Route::post("accept_offer", [OfferController::class, "accept_offer"]);


    //fetch_questions
    Route::get("fetch_questions", [QuestionController::class, "fetch_questions"]);

    //search_hotels
    Route::post("search_hotels", [HotelController::class, "search_hotels"]);

    //fetch_hotel_details
    Route::post("fetch_hotel_details", [HotelController::class, "fetch_hotel_details"]);

    //fetch_hotel_rooms
    Route::post("fetch_hotel_rooms", [HotelController::class, "fetch_hotel_rooms"]);

    //charge_wallet
    Route::post("charge_wallet", [WalletController::class, "charge_wallet"]);

    //upgrade_status
    Route::post("upgrade_status", [WalletController::class, "upgrade_status"]);

    //fetch_point_histories
    Route::get("fetch_point_histories", [UserController::class, "fetch_point_histories"]);

    //fetch_wallet_histories
    Route::get("fetch_wallet_histories", [UserController::class, "fetch_wallet_histories"]);


    //fetch_point_value
    Route::get("fetch_point_value", [UserController::class, "fetch_point_value"]);

    //fetch_wallet_value
    Route::get("fetch_wallet_value", [UserController::class, "fetch_wallet_value"]);
    //  Posts routes
    Route::post("add_post", [PostController::class, "add_post"]);
    Route::get("fetch_posts", [PostController::class, "fetch_posts"]);
    Route::post("like_post", [PostController::class, "like_post"]);
    //  Comments routes
    Route::post("add_comment", [CommentController::class, "add_comment"]);
    Route::post("fetch_post_comments", [CommentController::class, "fetch_post_comments"]);

    //fetch_home_banner
    Route::get("fetch_home_banner", [HomeBannerController::class, "fetch_home_banner"]);

    //verify_code
    Route::post("verify_code", [CheckCodeController::class, "verify_code"]);
    // add points to auth user
    Route::post("add_points", [UserController::class, "add_points"]);
    // user account
    Route::post("logout", [LogoutApiController::class, "logout"]);
    Route::get("delete_account", [AccountApiController::class, "delete_account"]);

    // fetch settings end point
    Route::get("fetch_settings", [SettingController::class, "fetch_settings"]);

    // fetch contract file
    Route::get("fetch_contract_file", [ContractController::class, "fetch_contract_file"]);

    //notification
    Route::get("fetch_notifictions", [NotificationApiController::class, "fetch_notifictions"]);

    //fetch_home_keys
    Route::get("fetch_home_keys", [ApiSettingController::class, "fetch_home_keys"]);
});
