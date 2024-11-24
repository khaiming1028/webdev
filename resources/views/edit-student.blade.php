<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0d113d0983.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navigation Bar -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html">
          <img src="img/inti.png" class="img-fluid" alt="Logo">
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('main') }}">Home</a></li>
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

  <!-- Main Content -->
  <main class ="edit">
    <div class=" container" style="margin-top: 100px;">
      <!-- Your form or content goes here -->
      <form method="POST" action="{{ route('student.update', $student->id) }}" class="my-form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="student_name">Student Name</label>
          <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Enter Student Name" value="{{ $student->student_name }}">
        </div>
        <div class="form-group">
          <label for="student_id">Student ID</label>
          <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID" value="{{ $student->student_id }}">
        </div>
        <div class="form-group">
          <label for="programme">Programme</label>
          <input type="text" name="programme" id="programme" class="form-control" placeholder="Enter Programme" value="{{ $student->programme }}">
        </div>
        <div class="form-group">
          <label for="student_contact">Student Contact</label>
          <input type="text" name="student_contact" id="student_contact" class="form-control" placeholder="Enter Contact Information" value="{{ $student->student_contact }}">
        </div>
        <div class="form-group">
          <label for="resume">Resume</label>
          <input type="file" name="resume" id="resume" class="form-control-file">
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
