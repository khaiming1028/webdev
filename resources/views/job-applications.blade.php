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
          <a href="{{ route('job-applications.view') }}">View Student Applications</a>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
          <div class="d-flex justify-content-between align-items-center mb-4">
          </div>

          <div class="table-responsive container">
            <h1>List of Job Applications</h1>

            <!-- Error Message for No Applications -->
            @if($jobApplications->isEmpty())
                <div class="alert alert-warning" role="alert">
                    No jobs applied.
                </div>
            @endif

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student ID</th>
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
                            <td scope="row">{{ $application->id }}</td>
                            <td>{{ $application->student->student_name  }}</td>
                            <td>{{ $application->student->student_id }}</td>
                            <td>{{ $application->job->position ?? 'N/A' }}</td>
                            <td>{{ $application->job->company_name }}</td>
                            <td>{{ $application->status }}</td>
                            <td>{{ $application->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                @if ($application->status === 'Pending')
                                    <a href="{{ route('job-applications.update-status', ['jobApplication' => $application->id, 'action' => 'accept']) }}" class="btn btn-sm btn-success">Accept</a>
                                    <a href="{{ route('job-applications.update-status', ['jobApplication' => $application->id, 'action' => 'decline']) }}" class="btn btn-sm btn-danger">Decline</a>
                                @else
                                    <span class="badge {{ $application->status === 'Accepted' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $application->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No job applications available.</td>
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
