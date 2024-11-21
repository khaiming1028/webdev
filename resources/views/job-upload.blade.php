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
    <div class="view-job-page">
        <!-- Sidebar -->
        <nav class="sidenav">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('job.view') }}">View Job List</a>
            <a href="{{ route('student.view') }}">View Student List</a>
            <a href="{{ route('job-applications.view') }}">View Student Applications</a>
        </nav>

        
    <form method="POST" action="{{route('job.store')}}" class="my-form">
        @csrf
        @method('post')
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
            <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Location</label>
            <input type="text" name="location" id="location" placeholder="Location" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Internship Position</label>
            <input type="text" name="position" id="position" placeholder="Internship Position" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Allowance</label>
            <input type="text" name="allowance" id="allowance" step="0.01" placeholder="Allowance" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Contact</label>
            <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Description</label>
            <input type="text" name="others" id="others" placeholder="Description" class="form-control">
        </div>
        <div class="form-group">
            <label for="job_status">Job Status</label>
            <select name="job_status" id="job_status"  class="form-control">
                <option value="Available">Available</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
       
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>



<style>
    .container {
        margin-top: 20px;
    }

    .my-form {
        max-width: 500px;
        margin: auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-control-file {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
    }
</style>