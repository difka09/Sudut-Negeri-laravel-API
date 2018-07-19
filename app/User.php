<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
   
    protected $fillable = [
        'name', 'email', 'password','identity_number', 'address', 'phone','verify', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    
     public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        
        return $this->api_token;
    }
    
    public function generateVerify()
    {
        $this->verify = "yes";
        $this->save();
        
        return $this->verify;
    }
    public function resetToken()
    {
        $this->api_token = null;
        $this->save();
        
        return $this->api_token;
    }
}
