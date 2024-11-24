<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Include your custom CSS link if needed -->
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="{{ route('main') }}"><span>INTI</span></a></h1>
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
  <div class="apply container my-5 pt-5">
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
