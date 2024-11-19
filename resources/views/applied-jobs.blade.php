<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5">
        <h2>Jobs Applied by {{ $student->student_name }}</h2>

        @if($appliedJobs->isEmpty())
            <p>No jobs applied yet.</p>
        @else
            <ul class="list-group">
                @foreach($appliedJobs as $jobApplication)
                    <li class="list-group-item">
                        <strong>Job Title:</strong> {{ $jobApplication->job->position }}<br>
                        <strong>Company:</strong> {{ $jobApplication->job->company_name }}<br>
                        <strong>Location:</strong> {{ $jobApplication->job->location }}<br>
                        <strong>Allowance:</strong> {{ $jobApplication->job->allowance }}<br>
                        <strong>Status:</strong> {{ $jobApplication->status }}<br>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
