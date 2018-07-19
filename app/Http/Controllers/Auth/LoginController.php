<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        if ($this->attemptLogin($request)){
            $user = $this->guard()->user();
            $user->generateToken();

            return response()->json(['message' => 'success',
                'data' => $user->toArray(),
            ]);
        }
        return response()->json(['message' => 'failed',
                ]);
    }
    
     public function ceklogin(Request $request)
    {
        $this->validateLogin($request);
        
        if ($this->attemptLogin($request)){
            $user = $this->guard()->user();

            return response()->json(['message' => 'success',
                'data' => $user->toArray(),
            ]);
        }
        return response()->json(['message' => 'failed',
                ]);
    }
    
    
     public function logout(Request $request)
    {
        $this->validateLogin($request);

          if ($this->attemptLogin($request)){
            
              $user = $this->guard()->user();
              $user->resetToken();
              return response()->json(['message' => 'success'], 200);
          }
        return response()->json(['message' => 'failed']);
        
        
       // $user = Auth::guard('api')->user(); //instance of the logged user
        
    //    if ($user){
      //      $user->resetToken();
        //    return response()->json(['status' => 'success',
          //      ]);
        //}
        
        
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
