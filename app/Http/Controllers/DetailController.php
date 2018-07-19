<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;
use DB; 

class DetailController extends Controller
{
    public function index()
    {
        //
    }
    
    public function show()
    {
        $details = DB::table('detail')->get();
        return response()->json(['message' => 'succes','data' => $details],200);
        
    }
    
    
    public function showId($id)      
    {

        $data = Detail::where('id', $id)->get();
        //if(isset($data) && count($data) > 0)
         return response()->json(['message' => 'success', 'data' => $data],200);
        
        //return response()->json(['message' => 'success', 'data' => 'data tidak ditemukan'],200);
        

        

    }
    
    public function showIdUser($id_user)
    {
       $data = Detail::where('id_user', $id_user)->get();

         //if(isset($data) && count($data) > 0)
         return response()->json(['message' => 'success', 'data' => $data],200);
        
        //return response()->json(['message' => 'success', 'data' => 'data tidak ditemukan'],200);
    }


}
