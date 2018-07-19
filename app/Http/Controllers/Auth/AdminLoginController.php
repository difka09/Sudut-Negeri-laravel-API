<?php

namespace App\Http\Controllers\auth;


use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;



class AdminLoginController extends Controller
{
     public function __construct()
    {
      $this->middleware('guest:admin');
    }
   /* public function showLoginForm()
    {
      return view('auth.admin-login');
    }*/
    
    public function login(Request $request)
    {
             /*   $validator = Validator::make($request->all(), [
                'email'   => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Sample message',
                'password.required'            => 'Another Sample Message'
            ]);*/

        /*$this->validate($request,
            [$this->validator($request->all())->validate();*/

    /*
      validator::make($request->all(),[
        'email'   => 'required|email',
        'password' => 'required|min:6',
      ])->validate();
      */

      
         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            
            $failedRules = $validator->failed();

            if(isset($failedRules['email']['Email'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'email invalid']);
            } else if(isset($failedRules['email']['Required'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'empty email']);
            } else if(isset($failedRules['password']['Required'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'empty password']);
                
            }
            
       }
      
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
       
      
           
       //return $this->Adminku($request, $admin);
    
        $admins = Admin::get(['name', 'email', 'password', 'photo', 'identity_number'])->first();



                //return response()->json(['message' => 'success', 'data' => $admins
                //  ]);
                
                
                return response()->json(['message' => 'success', 'data' => $admins], 200);
        
                /*'email' => $request->email, 'password' => $request->password], 200);*/

                    }
                    
      // if unsuccessful, then message "failed"
       return response()->json(['message' => 'failed',
                ]);
    }
    
    
    /*public function Adminku(Request $request, $admin)
    {
        return response()->json(['status' => 'success','data' => $admin->toArray()], 201);

    }*/
    
}