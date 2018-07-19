<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function sendResetLink(Request $request)

    {

        $this->validateEmail($request);
                                        // We will send the password reset link to this user. Once we have attempted
                                        // to send the link, we will examine the response then see the message we
                                        // need to show to the user. Finally, we'll send out a proper response.
        
    $response = $this->broker()->sendResetLink(
        $request->only('email')
    );

     $response == Password::RESET_LINK_SENT
                ? $this->sendResetLinkResponse($response)
                : $this->sendResetLinkFailedResponse($request, $response);

            if($response == "passwords.sent"){

                $response1["message"]= "success";
                $response1["quotes"]="reset link sent to email";
                
                return response()->json($response1);
            }

            $response1["message"]= "failed";
                $response1["quotes"]="user not found";
               
                return response()->json($response1);

}

}
