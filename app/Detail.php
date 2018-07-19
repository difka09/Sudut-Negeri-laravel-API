<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //$details = DB::table('detail')->get();

    protected $table = 'detail';

   protected $fillable = ['name', 'email', 'identity_number', 'address', 'phone' ,'id','name_project', 'location', 'target_at', 'information', 'photo'];
}
