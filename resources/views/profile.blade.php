<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>


    </style>
</head>

<body>

    <!-- Header and Navbar from Main Page -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="{{ route('main') }}"><span>INTI</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('main') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>
                    <li>
                        <a class="nav-link scrollto" href="{{ Auth::check() && Auth::user()->student ? route('student.applied-jobs', ['studentId' => Auth::user()->student->id]) : '#' }}">
                            Applied Jobs
                        </a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a class="nav-link scrollto" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Sign up</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Log in</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Profile Content Section -->
    <div class="container profile-container">
        <!-- Profile Information -->
        <div class="profile-info">
            <h1 class="text-center">{{ $student->student_name }}</h1>
            <p class="text-center">Student ID: {{ $student->student_id }}</p>
        </div>

        <!-- Contact Info Section -->
        <div class="profile-section">
            <h2>Contact Information</h2>
            <p>Email: {{ $student->user->email }}</p>
            <p>Phone: {{ $student->student_contact }}</p>
        </div>


        <!-- Resume Section -->
        <div class="profile-section resume">
            <h2>Resume</h2>
            @if($student->resume)
            <p><a href="{{ route('view.resume') }}?resume={{$student->resume}}" target="_blank">View Resume</a></p>
            @else
            <p>No resume uploaded.</p>
            @endif
        </div>

        <!-- Edit Profile Button -->
        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit Profile</a>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
