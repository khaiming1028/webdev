<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="profile-container">
        <div class="profile-details">
            <div class="profile-info">
                <h1 class="name">{{ $student->student_name }}</h1>
                <p class="title">Student ID: {{ $student->student_id }}</p>
                <p class="programme">Programme: {{ $student->programme }}</p>
            </div>
        </div>

        <div class="profile-details">
            <h2>Contact Information</h2>
            <p>Contact: {{ $student->student_contact }}</p>

            @if($student->status)
            <h2>Status</h2>
            <p>{{ $student->status }}</p>
            @endif

            @if($student->resume)
            <h2>Resume</h2>
            <p><a href="{{ asset('img/' . $student->resume) }}" target="_blank">View Resume</a></p>
            @else
            <h2>Resume</h2>
            <p>No resume uploaded.</p>

            @endif
        </div>
        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit Profile</a>
    </div>
</body>
</html>
