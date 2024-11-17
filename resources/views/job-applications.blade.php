<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Job Applications</title>
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
          <a href="{{ route('job-applications.view') }}">View Job Applications</a>
      </nav>

      <!-- Main Content -->
      <div class="main-content container">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h1>List of Job Applications</h1>
          </div>

          <div class="table-responsive">
              <table class="table table-striped table-bordered align-middle">
                  <thead class="table-dark">
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Job Position</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Application Status</th>
                          <th scope="col">Submitted On</th>
                          <th scope="col" class="text-center">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($jobApplications as $application)
                          <tr>
                              <th scope="row">{{ $application->id }}</th>
                              <td>{{ $application->student->student_name }}</td>
                              <td>{{ $application->job->position }}</td>
                              <td>{{ $application->job->company_name }}</td>
                              <td>{{ $application->status }}</td>
                              <td>{{ $application->created_at->format('Y-m-d') }}</td>
                              <td class="text-center">
                                  <a href="{{ route('job-applications.view', $application) }}" class="btn btn-sm btn-info">View</a>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="7" class="text-center">No job applications available.</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>
</body>
</html>
