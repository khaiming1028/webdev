<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function viewStudent(){
        
        $students = Student::all();
        return view('view-student',['students' => $students]);
    }

    public function createStudent()
    {
        return view('student-upload');
    }

    public function storeStudent(Request $request)
    {

        $user = auth()->user();

        $data = $request ->validate([
            'student_name' => 'required',
            'student_id' => 'required',
            'programme' => 'required',
            'student_contact' => 'required|numeric',
            'status' => 'nullable',
            'resume' =>'nullable'

        ]);
        

          //save to database   
          $newstudent = Student::create($data);
          return redirect(route('student.view'));
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
