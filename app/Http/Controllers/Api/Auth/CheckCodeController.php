<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class CheckCodeController extends Controller
{
    //
    use ApiTrait;

    // public function generate_Code() {
    //     $code =  strval(random_int(1000, 10000));
    //     $user = auth()->user();
    //     $user->update([
    //         "verfication_code" => $code,
    //     ]);

    // }

    public function verify_code(Request $request){
       // Helper function to generate a random verification code

    //    Mail::mailer('email@gmail.com')
    //    ->to($request->user())
    //    ->SendEmailVerificationNotification($user->verfication_code);

        try{
            $rules = [
                "verfication_code" => 'required|min:4',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }
            // dd($request->verfication_code);
            $user = auth()->user();
            // dd($user->verfication_code);
            if ($user->verfication_code == $request->verfication_code) {
                $user->update([
                    "email_verifiy" => 1,
                ]);
                $msg = __('messages.congratulations! email is verified');
                return $this->dataResponse($msg,true, 200);
            }
               else{
                $msg = __('messages.sorry, code does not match');
                return $this->dataResponse($msg,false, 200);
               }


        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(), 500);
        }
    }

    public function check_code(Request $request){
        try{
            $rules = [
                "email" => "required",
                "verfication_code" => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return $this->getvalidationErrors($validator);
            }


            $user = User::where('email' , $request->email)->first();
            // dd($user->verfication_code);

            if($user){

                if ($user->verfication_code == $request->verfication_code) {
                    $user->update([
                        "email_verifiy" => 1,
                    ]);
                    $msg = __('messages.congratulations! email is verified');
                    return $this->dataResponse($msg,new UserResource($user), 200);
                }
                   else{
                    $msg = __('messages.sorry, code does not match');
                    return $this->dataResponse($msg,[], 200);
                   }
            }else{
                $msg = __('messsage.wrong email entered');
                return $this->dataResponse($msg , [] , 200);
            }
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }

    // public function send_otp(){
    //     try{
    //         $user=auth()->user();
    //         $otp = $user->verfication_code;
    //         $mail = $user->email;

    //         $mail_details = [
    //             'subject' => 'Account Verfiy',
    //             'body' => 'Your verfication code is : '. $otp
    //         ];

    //         if($user){
    //             Mail::to($mail)->send(new SendEmailMessage($mail_details));
    //             $msg = 'verification code is sent successfult to mail';
    //             return $this->successResponse($msg , 200);
    //         }

    //     }catch(\Exception $ex){
    //         return $this->returnException($ex->getMessage(),500);
    //     }
    // }
}
