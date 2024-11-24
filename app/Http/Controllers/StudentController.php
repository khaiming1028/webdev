<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function viewStudent(){

        $students = Student::all();
        return view('view-student',['students' => $students]);
    }

    public function profile()
    {
        $student = Auth::user()?->student;


        if (!$student) {
            return redirect()->route('student.create')->with('info', 'Please create a profile first.');
        }

        return view('profile', ['student' => $student]);
    }


    public function createStudent()
    {
        $user = Auth::user();


        // Check if the user already has a profile
        if ($user->student) {
            return redirect()->route('profile')->with('info', 'You already have a profile.');
    }
    return view('student-upload');

}

public function storeStudent(Request $request)
{

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to create a profile.');
    }

    $data = $request->validate([
        'student_name' => 'required',
        'student_id' => 'required',
        'programme' => 'required',
        'student_contact' => 'required|numeric',
        'status' => 'nullable',
        'resume' => 'nullable|file',
    ]);

    // Handle resume upload
    if ($request->hasFile('resume')) {
        $data['resume'] = $request->file('resume')->store('resumes', 'public');
    }

    // Link the profile to the logged-in user
    $data['user_id'] =Auth::id();
    // Save the profile
    $student = Student::create($data);

    // Check if student was created

    return redirect()->route('view.profile')->with('success', 'Profile created successfully!');
}

    public function editStudent(Student $student)
    {
        return view('edit-student',['student' => $student]);
    }

    public function updateStudent(Student $student, Request $request)
{
    // Ensure the user is logged in
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to update your profile.');
    }

    // Ensure the student belongs to the logged-in user
    if ($student->user_id !== Auth::id()) {
        return redirect()->route('view.profile')->with('error', 'Unauthorized action.');
    }

    // Validate the incoming data
    $data = $request->validate([
        'student_name' => 'required',
        'student_id' => 'required',
        'programme' => 'required',
        'student_contact' => 'required|numeric',
        'status' => 'nullable',
        'resume' => 'nullable|file|max:2048',
    ]);

    // Handle resume upload
    if ($request->hasFile('resume')) {
        $data['resume'] = $request->file('resume')->store('resumes', 'public');
    }

    // Save the updated profile
    $student->update($data);

    // Redirect with success message
    return redirect()->route('view.profile')->with('success', 'Profile updated successfully!');
}


    public function destroyStudent(Student $student)
    {
        $student->delete();
        return redirect(route('student.view'))->with('Delete Succesful');

    }


    public function showAppliedJobs($studentId)
    {
        // Find the student by their ID and ensure they exist
        $student = Student::findOrFail($studentId);

        // Get the student's job applications where the student and job both exist and meet certain conditions
        $appliedJobs = $student->jobApplications()
            ->whereHas('student', function($query) use ($studentId) {
                // Optional: Apply a filter on the student relationship if needed
                $query->where('id', $studentId);
            })
            ->whereHas('job', function($query) {
                // Optional: Apply a filter on the job relationship if needed, e.g., filter by job position
                $query->whereNotNull('company_name'); // Example filter: Only jobs with a company name
            })
            ->with('job') // Ensure job data is included
            ->get();

        // Return the view with the applied jobs
        return view('applied-jobs', compact('student', 'appliedJobs'));
    }

    public function view_resume(Request $request){
        if(Storage::disk('public')->has($request->resume)){
            return Storage::disk('public')->response($request->resume);
        }

        abort(404);
    }


    public function editStudentAdmin(Student $student)
    {
        return view('edit-student-admin',['student' => $student]);
    }

    public function updateStudentAdmin(Student $student, Request $request)
{


    // Validate the incoming data
    $data = $request->validate([
        'student_name' => 'required',
        'student_id' => 'required',
        'programme' => 'required',
        'student_contact' => 'required|numeric',
        'status' => 'nullable',
        'resume' => 'nullable|file|max:2048',
    ]);

    // Handle resume upload
    if ($request->hasFile('resume')) {
        $data['resume'] = $request->file('resume')->store('resumes', 'public');
    }

    // Save the updated profile
    $student->update($data);

    // Redirect with success message
    return redirect()->route('student.view')->with('success', 'Profile updated successfully!');
}
}
