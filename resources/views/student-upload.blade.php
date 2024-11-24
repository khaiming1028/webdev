<html>
<head>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Main Template Link -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        /* Additional Custom Styles for the Form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            padding: 0;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .form-control {
            border-radius: 5px;
        }

        .form-container .btn {
            width: 100%;
            padding: 10px;
        }

        /* Ensure the form looks good on small screens */
        @media (max-width: 768px) {
            .form-container .form-control {
                font-size: 14px;
            }
            .form-container .btn {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

  <!-- Header with Navbar -->
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
          <li><a class="nav-link scrollto" href="{{ Auth::check() && Auth::user()->student ? route('student.applied-jobs', ['studentId' => Auth::user()->student->id]) : '#' }}">Applied Jobs</a></li>
          @if(Auth::check())
          <li>
            <a class="nav-link scrollto" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
  <section class="form-container">
    <div class="container">
      <h2 class="text-center mb-4">Student Registration</h2>
      <form method="POST" action="{{ route('student.store') }}" class="my-form" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="student_name">Student Name</label>
              <input type="text" name="student_name" id="student_name" placeholder="Student Name" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="student_id">Student ID</label>
              <input type="text" name="student_id" id="student_id" placeholder="Student ID" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="programme">Programme</label>
          <input type="text" name="programme" id="programme" placeholder="Programme" class="form-control">
        </div>

        <div class="form-group">
          <label for="student_contact">Student Contact</label>
          <input type="text" name="student_contact" id="student_contact" placeholder="Student Contact" class="form-control">
        </div>

        <div class="form-group">
          <label for="resume">Resume</label>
          <input type="file" name="resume" id="resume" class="form-control-file">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
