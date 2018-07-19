<?php

namespace App\Http\Controllers;

use Validator;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;



class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        
        return response()->json(['message' => 'succes','data' => $projects->toArray()],201);
        
        //Return Project::all();
        //return response()->json(Project::all()->toArray(), 201);
        //$user = $this->create()->all;
        //return response()->json(['status' => 'success','data' => $user->toArray()], 201);

        
        
    }
    
    public function show(Project $project)
    {
        return response()->json(['message' => 'success','data' => $project]);

    }
    
    public function update(Request $request, Project $project)
    {
        
        $project->update($request->all());
        return response()->json(['message' => 'success', 'data'=> $project], 201);

        //return response()->json($project, 200);
    }
    
  
     public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name_project' => 'required',
            'location' => 'required',
            'photo' => 'required',
            'information' => 'required',
            'target_at' => 'required',
            'funds' => 'required',
            'target_funds' => 'required',
            'verify' => 'required',
            'id_user'=> 'required',
            ]);
            
            if ($validator->fails()){
            $errors = $validator->errors();
            return response()->json(['message' => 'failed', 'data' =>  $errors]);
            }

//             if ($validator->fails()) {
//             return response()->json(['message'=> $validator->customMessages]);
// }

        
        $project = Project::create($request->all());
        return response()->json(['message' => 'success','data' => $project], 201);
        
        
        
     //   return response()->json($project, 201);
    }
    
    public function showVerify($verify)      
    {
        $data = Project::where('verify', $verify)->get();
        
          
        //if(isset($data) && count($data) > 0)
        
    //    {
            return response()->json(['message' => 'success', 'data' => $data],200);
            
      //  }
        
        //return response()->json(['message' => 'success', 'data' => 'data tidak ditemukan'],200);
        
    }

    
     public function delete(Project $project)
    {
        $project->delete();
        
        return response()->json([
            'message' => 'success']);
    }
    //protected function registered(Request $request, $user)
    //{
        
      //  return response()->json('status' => 'success','project_name' => $value , 201);
    //}
}