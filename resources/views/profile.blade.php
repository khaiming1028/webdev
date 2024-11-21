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
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f7f7f7;
        }

        .profile-header {
            background-color: #007bff;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            border-bottom: 5px solid #0056b3;
        }

        .profile-header h1 {
            font-size: 2.5rem;
        }

        .profile-header p {
            font-size: 1.1rem;
        }

        .profile-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-section h2 {
            font-size: 1.75rem;
            color: #333;
            margin-bottom: 15px;
        }

        .profile-section p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        .profile-section .resume a {
            color: #007bff;
            text-decoration: none;
        }

        .profile-section .resume a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            display: block;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info .info-text h3 {
            font-size: 1.75rem;
        }

        .profile-info .info-text p {
            font-size: 1.1rem;
            color: #777;
        }

    </style>
</head>

<body>

    <!-- Header and Navbar from Main Page -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="{{ route('main') }}"><span>LOGO</span></a></h1>
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
            <p>Email: {{ $student->email }}</p>
            <p>Phone: {{ $student->student_contact }}</p>
        </div>

        <!-- Status Section -->
        @if($student->status)
        <div class="profile-section">
            <h2>Status</h2>
            <p>{{ $student->status }}</p>
        </div>
        @endif

        <!-- Resume Section -->
        <div class="profile-section resume">
            <h2>Resume</h2>
            @if($student->resume)
            <p><a href="{{ asset('img/' . $student->resume) }}" target="_blank">View Resume</a></p>
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
