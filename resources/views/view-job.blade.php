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

        <!-- Main Content -->
        <div class="main-content ">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('job.create') }}" class="btn btn-primary">Create a Job</a>
            </div>

            <div class="table-responsive container">
                <h1>List of Jobs</h1>

                <table class="table table-striped table-bordered align-middle mx-auto">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Position</th>
                            <th scope="col">Allowance</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Others</th>
                            <th scope="col">Job Status</th>
                            <th scope="col" colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                            <tr>
                                <td scope="row">{{ $job->id }}</td>
                                <td>{{ $job->category }}</td>
                                <td>{{ $job->company_name }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->position }}</td>
                                <td>{{ $job->allowance }}</td>
                                <td>{{ $job->contact }}</td>
                                <td>{{ $job->others }}</td>
                                <td>{{ $job->job_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('job.edit', $job) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('job.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No jobs available.</td>
                            </tr>
                        @endforelse
                    </tbody>
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
