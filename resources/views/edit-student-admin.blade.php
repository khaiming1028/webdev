<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - List of Jobs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="view-job-page admin pt-5">
        <!-- Sidebar -->
        <nav class="sidenav">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('job.view') }}">View Job List</a>
            <a href="{{ route('student.view') }}">View Student List</a>
            <a href="{{ route('job-applications.view') }}">View Student Applications</a>
        </nav>
    <form method="POST" action="{{ route('student.update.admin', $student->id) }}" class="my-form" enctype="multipart/form-data">
        @csrf
            @method('put')
            <div class="form-group">
                <label for="type">Student Name</label>
                <input type="text" name="student_name" id="student_name" placeholder="Student Name" class="form-control"  value="{{$student->student_name}}">
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" id="student_id" placeholder="Student ID" class="form-control"  value="{{$student->student_id}}">
            </div>
            <div class="form-group">
                <label for="programme">Programme</label>
                <input type="text" name="programme" id="programme" placeholder="Programme" class="form-control"  value="{{$student->programme}}">
            </div>
            <div class="form-group">
                <label for="student_contact">Student Contact</label>
                <input type="text" name="student_contact" id="student_contact" placeholder="student_contact" class="form-control"  value="{{$student->student_contact}}">
            </div>
            <div class="form-group">
                <label for="resume">Resume</label>
                <input type="file" name="resume" id="resume" placeholder="Resume" class="form-control-file"  value="{{$student->resume}}">
            </div>
             <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>

