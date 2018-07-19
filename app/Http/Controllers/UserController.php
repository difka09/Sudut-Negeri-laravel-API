<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Mail\SudutNegeri;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class UserController extends Controller
{

    public function index()
    {
    
        $users = User::all();
        return response()->json(['message' => 'succes','data' => $users->toArray()],200);
    }
    
    public function show(User $user)
        
    {
        return response()->json(['message' => 'success','data' => $user]);
        
    }
    
     public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['message' => 'success', 'data' => $user], 201);
    }
    
    
        public function showVerify($verify)      
    {
        $data = User::where('verify', $verify)->get();
        
          
        //if(isset($data) && count($data) > 0)
        
//        {
            return response()->json(['message' => 'success', 'data' => $data],200);
            
        //}
        
        return response()->json(['message' => 'success', 'data' => 'data tidak ditemukan'],200);
        
    }
         
    public function delete(User $user)
    {
   
    $users = User::get(['email'])->whereIn('id', $user)->first();
        $this->kirimemail($user);
        $user->delete();
      
        return response()->json([
            'message' => 'success']);

    }
    
  
    
    public function kirimemail(User $user)
    {
        $email = $user['email'];

        Mail::send('emails.welcome1', $user->toArray(), function ($message) use ($email)
        {
            $message->from('grownssh@gmail.com', 'no-reply');

            $message->to($email)->subject('Sudut Negeri');
        });

    }
    
}



