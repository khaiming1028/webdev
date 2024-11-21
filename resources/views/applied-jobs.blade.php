<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            background-color: #ffffff; /* White card background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 30px;
        }

        h2 {
            font-weight: bold;
            color: #343a40; /* Dark gray */
            text-align: center;
            margin-bottom: 30px;
        }

        .list-group-item {
            background-color: #fdfdfd; /* Slightly off-white */
            border: 1px solid #e9ecef; /* Light gray border */
            margin-bottom: 10px; /* Add spacing between items */
            border-radius: 6px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Light shadow */
        }

        .list-group-item strong {
            color: #495057; /* Medium gray text for labels */
        }

        p {
            text-align: center;
            color: #6c757d; /* Muted gray */
            font-size: 18px;
        }
    </style>
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
