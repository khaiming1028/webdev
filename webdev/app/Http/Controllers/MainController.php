<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function viewJob()
    {
        $jobs = Job::all();
        return view('view-job',['jobs' => $jobs]);
    } 

    public function createJob()
    {
        return view('job-upload');
    }

    public function storeJob(Request $request)
    {

        $data = $request ->validate([
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',

        ]);
        

          //save to database   
          $newjob = Job::create($data);
          return redirect(route('job.view'));
    }

    public function editJob(Job $job)
    {
        return view('edit-job',['job' => $job]);  
    }

    public function updateJob(Job $job, Request $request)
    {
        $data = $request ->validate([
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',

        ]);

        $job->update($data);
        return redirect(route('job.view'))->with('Update Succesful');
    }

    public function destroyJob(Job $job)
    {
        $job->delete(); 
        return redirect(route('job.view'))->with('Delete Succesful');

    }
}
