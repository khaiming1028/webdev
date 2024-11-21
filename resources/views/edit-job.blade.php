!DOCTYPE html>
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
        <form method="POST" action="{{route('job.update',['job'=> $job])}}" class="my-form">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category"  class="form-control">
                    <option value="Accounting">Accounting</option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Hospitality">Hospitality</option>
                    <option value="HR">HR</option>
                    <option value="Customer Service">Customer Service</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Company Name</label>
                <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control" value="{{$job->company_name}}">
            </div>
            <div class="form-group">
                <label for="brand">Location</label>
                <input type="text" name="location" id="location" placeholder="Location" class="form-control" value="{{$job->location}}">
            </div>
            <div class="form-group">
                <label for="brand">Internship Position</label>
                <input type="text" name="position" id="position" placeholder="Internship Position" class="form-control" value="{{$job->position}}">
            </div>
            <div class="form-group">
                <label for="brand">Allowance</label>
                <input type="text" name="allowance" id="allowance" step="0.01" placeholder="Allowance" class="form-control" value="{{$job->allowance}}">
            </div>
            <div class="form-group">
                <label for="brand">Contact</label>
                <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control" value="{{$job->contact}}">
            </div>
            <div class="form-group">
                <label for="brand">Description</label>
                <input type="text" name="others" id="others" placeholder="Description" class="form-control" value="{{$job->others}}">
            </div>
            <div class="form-group">
                <label for="job_status">Job Status</label>
                <select name="job_status" id="job_status"  class="form-control">
                    <option value="Available">Available</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>


