<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - List of Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Custom CSS for Sidebar -->
</head>
<body>
    <div class="view-job-page">
    <!-- Sidebar -->
    <nav class="sidenav">
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('job.view') }}">View Job List</a>
        <a href="{{route('student.view')}}">View Student List</a>
        <a href="{{ route('job-applications.view') }}">View Student Applications</a>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="container">
            <h1>List of Student</h1>

            <table class="table table-striped table-bordered align-middle mx-auto">
                <thead class="table-dark">

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
                </thead>

           @foreach ($students as $student)
           <tr>
               <td>{{$student ->id}}</td>
               <td>{{$student ->student_name}}</td>
               <td>{{$student ->student_id}} </td>
               <td>{{$student ->programme}}</td>
               <td>{{$student ->student_contact}}</td>
               <td>{{$student ->status}}</td>
               <a href="{{ asset('img/' . $student->resume) }}" download="{{$student->resume}}">
                 <td>{{$student->resume}}</td>
             </a>
               <td><a href="{{route('student.edit', ['student' => $student])}}" class="btn btn-sm btn-warning">Edit</a></td>
               <td>
                 <form method="post" action="{{route('student.destroy', ['student' => $student])}}">
                   @csrf
                   @method('delete')
                   <input type="submit" value="Delete" class="btn btn-sm btn-danger">

                 </form>
               </td>
           </tr>
           @endforeach
          </table>
       </div>
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
