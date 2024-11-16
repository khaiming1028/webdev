<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;



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
        'student_id' => 'required|unique:students,student_id',
        'programme' => 'required',
        'student_contact' => 'required|numeric',
        'status' => 'nullable',
         'resume' => 'nullable|file|max:2048',
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
        $data = $request ->validate([
            'student_name' => 'required',
            'student_id' => 'required',
            'programme' => 'required',
            'student_contact' => 'required|numeric',
            'status' => 'nullable',
            'resume' =>'nullable'

        ]);

        $student->update($data);
        return redirect(route('student.view'))->with('Update Succesful');
    }

    public function destroyStudent(Student $student)
    {
        $student->delete();
        return redirect(route('student.view'))->with('Delete Succesful');

    }

}
