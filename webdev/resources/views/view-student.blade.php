<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - List of Jobs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS for Sidebar -->
    <style>
        body {
            display: flex;
        }

        /* Sidebar styling */
        .sidenav {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 60px;
            transition: 0.3s;
        }

        .sidenav a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 1rem;
            color: #ddd;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #fff;
            background-color: #495057;
        }

        /* Main content styling */
        .main-content {
            margin-left: 250px; /* Same as the sidebar's width */
            padding: 20px;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidenav {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidenav">
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('job.view') }}">View Job List</a>
        <a href="{{route('student.view')}}">View Student List</a>
        <a href="/">View Student Applications</a>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List of Jobs</h1>
            <a href="{{ route('job.create') }}" class="btn btn-primary">Create a Job</a>
        </div>
        <div class="container">
          <table border ="1" class= "table table-striped">
           <tr>
             <th>ID</th>
       
              <th>Student Name</th> 
           
               <th>Student ID</th>
           
               <th>Programme</th>
       
               <th>Student Contact</th>
       
               <th>Status</th>
               <th>Resume</th>
       
               <th></th>
               <th></th>
       
           </tr>
           
           @foreach ($students as $student)
           <tr>
               <th>{{$student ->id}}</th>
               <th>{{$student ->student_name}}</th>
               <th>{{$student ->student_id}} </th>
               <th>{{$student ->programme}}</th>
               <th>{{$student ->student_contact}}</th>
               <th>{{$student ->status}}</th>
               <a href="{{ asset('img/' . $student->resume) }}" download="{{$student->resume}}">
                 <th>{{$student->resume}}</th>
             </a>      
               <th><a href="{{route('student.edit', ['student' => $student])}}">Edit</a></th>
               <th>
                 <form method="post" action="{{route('student.destroy', ['student' => $student])}}">
                   @csrf
                   @method('delete')
                   <input type="submit" value="Delete">
                   
                 </form>
               </th>
           </tr> 
           @endforeach
          </table>
       </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>
</body>
</html>
