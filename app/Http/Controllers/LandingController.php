<?php

namespace App\Http\Controllers;

use DB;
use App\LandingView;
use Illuminate\Http\Request;


class LandingController extends Controller
{

    Public function index()
    {
        $landing = DB::table('landing')->get(['id','name_project','location', 'photo', 'verify','difftime'])->where('difftime','<=',8);
         return response()->json(['message' => 'succes','data' => $landing],200);
        
    }
    
     public function showDay($difftime)
    {
       $data = LandingView::where('difftime', $difftime)->get();

         if(isset($data) && count($data) > 0)
        { return response()->json(['message' => 'success', 'data' => $data],200);
        }
        return response()->json(['message' => 'success', 'data' => 'data tidak ditemukan'],200);
    }//tidak kepake
    
     Public function showTotal(Request $request)
    {
        $total = DB::table('total')->get()->first();
         return response()->json(['message' => 'succes', 'data' => $total],200);
        
    }
    
}
