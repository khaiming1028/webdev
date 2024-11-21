<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Internship Vacancy Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Reddit-like styling for posts */

    </style>
</head>

<body>
    <!-- Header and Navbar -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

          <div class="logo">
            <a href="index.html">
              <img src="asset{{('img/inti.png')}}" class="img-fluid" alt="Logo">
            </a>
          </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{ route('main') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>
                    <li><a class="nav-link scrollto " href="{{ route('student.applied-jobs', ['studentId' => Auth::user()->student->id]) }}">Job Applied</a></li>


                    <!-- Log in / Logout Logic -->
                    @if(Auth::check())
                        <!-- Show Logout if user is authenticated -->
                        <li>
                            <a class="nav-link scrollto" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- Show Log in if user is not authenticated -->
                        <li><a class="nav-link scrollto" href="{{ route('register') }}">Sign up</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Log in</a></li>

                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-5 forum pt-5" style="max-width: 800px;">
        <!-- Forum Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Forum Discussions</h2>
            <a href="{{ route('forum.create') }}" class="btn btn-primary">Create a New Post</a>
        </div>

        <!-- Forum Posts -->
        @foreach ($forums as $forum)
        <div class="post-card">
            <div class="post-body">
                <h5 class="card-title">
                    <a href="{{ route('forum.show', $forum) }}">{{ $forum->forums_title }}</a>
                </h5>
                <p class="card-text">{{ $forum->forums_content }}</p>
                <p><strong>Posted By:</strong> {{ $forum->student->student_name ?? 'Unknown' }}</p>

                <!-- Only show the Edit and Delete buttons if the logged-in user is the post owner -->
                @if (Auth::check() && Auth::user()->student->id === $forum->student_id)
                    <div class="post-actions">
                        <a href="{{ route('forum.edit', $forum) }}" class="text-warning">Edit</a>
                        <form action="{{ route('forum.destroy', $forum) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>
</body>
</html>
