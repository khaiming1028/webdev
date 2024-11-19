<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Student;
use App\Models\Forum;



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
    $company_name = $request->input('search');  // First search box for 'company_name'
    $location = $request->input('location');   // Second search box for 'location'
    $category = $request->input('category');   // Dropdown for 'category'

    // Build the query with conditional filters
    $jobs = Job::query()
        ->when($company_name, function ($query, $company_name) {
            return $query->where('company_name', 'LIKE', "%{$company_name}%");
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




public function applyForJob(Request $request, $jobId)
{
    // Ensure the user is authenticated
    $userId = Auth::id();

    // Check if the user has a profile in the students table
    $student = Student::where('user_id', $userId)->first();
    if (!$student) {
        return redirect()->route('student.create')->with('error', 'You must create a profile before applying for a job.');
    }

    // Check if the job exists
    $job = Job::findOrFail($jobId);

    // Check if the user has already applied for this job
    $existingApplication = JobApplication::where('student_id', $student->id)
        ->where('job_id', $job->id)
        ->first();

    if ($existingApplication) {
        return back()->with('error', 'You have already applied for this job.');
    }

    // Create the job application
    JobApplication::create([
        'student_id' => $student->id,
        'job_id' => $job->id,
        'status' => 'Pending',
    ]);

    return redirect()->route('main')->with('success', 'Job application submitted successfully!');
}

public function viewJobApplications()
{
    // Retrieve all job applications with related student and job data
    $jobApplications = JobApplication::with('student', 'job')->get();

    return view('job-applications', compact('jobApplications'));
}

public function updateApplicationStatus(JobApplication $jobApplication, $action)
{
    // Update status based on the action
    if ($action === 'accept') {
        $jobApplication->status = 'Accepted';
    } elseif ($action === 'decline') {
        $jobApplication->status = 'Declined';
    }

    $jobApplication->save();

    return redirect()->back()->with('success', 'Application status updated successfully.');
}

public function getDashboardData()
{
    $data = [
        'jobApplications' => [
            'accepted' => JobApplication::where('status', 'Accepted')->count(),
            'rejected' => JobApplication::where('status', 'Declined')->count(),
            'pending' => JobApplication::where('status', 'Pending')->count(),
        ],
        'jobsPublished' => Job::count(),
        'usersRegistered' => Student::count(),
        'jobsApplied' => JobApplication::count(),
        'forumPosted' => Forum::count(),
    ];

    return response()->json($data);
}
}
