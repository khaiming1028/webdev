<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Resources\JobResource;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index()
    {
        $jobs = Job::get();

        if($jobs)
        {
            return JobResource::collection($jobs);
        }
        else{
            return response()->json(['message'=> 'No record Available'],200);
        }
    
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'category'=> 'required',
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',
        ]);
       
        if($validator->fails())
        {
            return response()->json([
                'message'=> 'Please Fill in all fields.',
                 'error'=> $validator->messages(),
            ],422);
        }
        
        $job = Job::create([
            'category'=> $request->category,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'position' => $request->position,
            'allowance' => $request->allowance,
            'contact' => $request->contact,
            'others' => $request->others,

        ]);
          

          return response()->json([
            'message' => 'Job Uploaded Succesfully',
             'data' => new JobResource($job)
          ],200);
    }

    public function show(Job $job)
    {
        return new JobResource($job);
    }

    public function update(Request $request, Job $job)
    {
        $validator = Validator::make($request->all(),[
            'category'=> 'required',
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',
        ]);
       
        if($validator->fails())
        {
            return response()->json([
                'message'=> 'Please Fill in all fields.',
                 'error'=> $validator->messages(),
            ],422);
        } 

        $job ->update([
            'category'=> $request->category,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'position' => $request->position,
            'allowance' => $request->allowance,
            'contact' => $request->contact,
            'others' => $request->others,

        ]);
          

          return response()->json([
            'message' => 'Job Updated Succesfully',
             'data' => new JobResource($job)
          ],200);
    }

    public function destroy(Job $job)
    {
        $job->delete(); 
        return response()->json([
            'message' => 'Job Deleted Succesfully',
          ],200);
    }
}
