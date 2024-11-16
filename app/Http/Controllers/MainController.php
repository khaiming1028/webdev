<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class MainController extends Controller
{
    public function index()
    {
        $jobs = Job::all(); // Get all jobs from the database or any other source
        return view('main', compact('jobs'));    }



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
            'category' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',
            'job_status' => 'required'

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
            'category'=>'required',
            'company_name' => 'required',
            'location' => 'required',
            'position' => 'required',
            'allowance' => 'required|numeric',
            'contact' => 'required',
            'others' => 'nullable',
            'job_status' => 'required'


        ]);

        $job->update($data);
        return redirect(route('job.view'))->with('Update Succesful');
    }

    public function destroyJob(Job $job)
    {
        $job->delete();
        return redirect(route('job.view'))->with('Delete Succesful');

    }

    public function searchJob_main(Request $request)
{
    // Get the search parameters from the request
    $others = $request->input('search');  // First search box for 'description'
    $location = $request->input('location');   // Second search box for 'location'
    $category = $request->input('category');   // Dropdown for 'category'

    // Build the query with conditional filters
    $jobs = Job::query()
        ->when($others, function ($query, $others) {
            return $query->where('others', 'LIKE', "%{$others}%");
        })
        ->when($location, function ($query, $location) {
            return $query->where('location', 'LIKE', "%{$location}%");
        })
        ->when($category, function ($query, $category) {
            return $query->where('category', '=', $category);
        })
        ->get();

    // Return the filtered jobs to the view
    return view('job-result', ['jobs' => $jobs]);
}

}
