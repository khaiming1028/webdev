<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $jobApplication;
    public $status;

    public function __construct(JobApplication $jobApplication, $status)
    {
        $this->jobApplication = $jobApplication;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Your Job Application Status')
                    ->view('email')
                    ->with([
                        'student_name' => $this->jobApplication->student->student_name,
                        'position' => $this->jobApplication->job->position,
                        'company_name' => $this->jobApplication->job->company_name,
                        'status' => $this->status,
                    ]);
    }
}
