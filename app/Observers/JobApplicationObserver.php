<?php

namespace App\Observers;

use App\Models\JobApplication;
use App\Models\Student;

class JobApplicationObserver
{
    public function updated(JobApplication $jobApplication)
    {
        // Check if the status has changed
        if ($jobApplication->isDirty('status')) {
            $student = Student::find($jobApplication->student_id);

            // Update the student's status based on the job application status
            if ($student) {
                $student->status = $jobApplication->status;
                $student->save();
            }
        }
    }
}
