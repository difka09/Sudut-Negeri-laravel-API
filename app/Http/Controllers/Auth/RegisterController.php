<?php

namespace App\Http\Controllers\Auth;



use App\User;
use App\Mail\SudutNegeri;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    public function register(Request $request)
     {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'identity_number' => 'required|numeric|max:16|unique:users',
            'verify' => 'required|string|max:3',
            'phone' => 'required|numeric|max:14',
            'photo' => 'string',
        ]);
        
        if($validator->fails()){
              
            $failedRules = $validator->failed();
            
            if(isset($failedRules['email']['Email'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'masukkan email dengan benar']);
            }
            
            if(isset($failedRules['identity_number']['Numeric'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'Nomor KTP tidak valid']);
            }
            
            if(isset($failedRules['phone']['Numeric'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'Nomor HP tidak valid']);
            }
            
            if(isset($failedRules['email']['Unique'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'Email sudah digunakan']);
            }
            
            if(isset($failedRules['identity_number']['Unique'])) {
                
                return response()->json(['message' => 'failed', 'data' => 'No KTP sudah digunakan']);
            }


        }
            event(new Registered($user = $this->create($request->all())));
        
            return $this->registered($request, $user);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected function registered(Request $request, $user)
    {
    
        return response()->json(['message' => 'success','data' => $user->toArray()], 201);
    }
    
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'identity_number' => $data['identity_number'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'verify' => $data['verify'] = "no",
            'photo' => $data['photo'],
        ]);
        Mail::to($data['email'])->send(new SudutNegeri($user));

        return $user;
    }
}
			