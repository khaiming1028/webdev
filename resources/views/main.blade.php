<html>
    <head>
<!--Bootstrap Link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!--CSS Main Template Link-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>

    <!-------------------------------------Start of Body--------------------------------------->
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

  <!-- Search Section -->
  <section id="search" class="d-flex align-items-center">
    <div class="container pt-5">
      <div class="row gy-4">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <div class="m-auto text-center">
            <h2>Search for Jobs</h2>
            <form action="{{ route('job.result') }}" method="GET" class="search-form">
              <div class="row g-3">
                <div class="col-md-4">
                  <input type="search" class="form-control" id="email" placeholder="Company Name" name="search" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="location" placeholder="Location" name="location" value="{{ request('location') }}">
                </div>
                <div class="col-md-4">
                  <select name="status" id="status" class="form-select">
                    <option value="">Select Category</option>
                    <option value="Accounting" {{ request('category') == 'Accounting' ? 'selected' : '' }}>Accounting</option>
                    <option value="IT" {{ request('category') == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Marketing" {{ request('category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="Engineering" {{ request('category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                    <option value="Hospitality" {{ request('category') == 'Hospitality' ? 'selected' : '' }}>Hospitality</option>
                    <option value="HR" {{ request('category') == 'HR' ? 'selected' : '' }}>HR</option>
                    <option value="Customer Service" {{ request('category') == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
                  </select>
                </div>
              </div>
              <div class="mt-4">
                <button type="submit" class="btn btn-info">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


<!--Jobs option section-->
<section id="intro" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
        <h2 class="text-center mb-4">Available Jobs</h2>
        <div>
          <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($jobs as $job)
              <div class="col">
                <div class="card job-card">
                  <div class="card-body">
                    <h5 class="card-title">{{ $job->company_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $job->position }}</h6>
                    <p class="card-text"><strong>Allowance:</strong> ${{ $job->allowance }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $job->location }}</p>
                    <a href="#"
                      onclick="event.preventDefault(); document.getElementById('apply-form-{{ $job->id }}').submit();"
                      class="card-link btn btn-primary btn-apply">
                      Apply Now
                    </a>
                    <form id="apply-form-{{ $job->id }}" action="{{ route('jobs.apply', $job->id) }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>



<section id="partner" class="clients section-bg">
    <div class="container" data-aos="fade-up">
      <!-- Section Title -->
      <div class="section-title">
        <h2>Company</h2>
        <p>They trusted us</p>
      </div>

      <!-- Partner Logos -->
      <div class="partner row justify-content-center">
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/intel.png" class="partner-logo" alt="Company 1">
        </div>
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/amd.jpg" class="partner-logo" alt="Company 2">
        </div>
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/keysight.png" class="partner-logo" alt="Company 3">
        </div>
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/exabyte.png" class="partner-logo" alt="Company 4">
        </div>
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="img/plexus.png" class="partner-logo" alt="Company 5">
        </div>
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="img/huawei.png" class="partner-logo" alt="Company 5">
          </div>
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="img/jabil.png" class="partner-logo" alt="Company 5">
          </div>
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="img/broadcom.png" class="partner-logo" alt="Company 5">
          </div>
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="img/westerndigital.jpg" class="partner-logo" alt="Company 5">
          </div>
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="img/images.png" class="partner-logo" alt="Company 5">
          </div>
      </div>
    </div>
  </section>





    </body>
    <!-------------------------------------End of Body--------------------------------------->



    <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>INTI College Penang</h3>
        <p>
            123-123-123 dnfksnkfsddsnk <br><br>
          <strong>Phone:</strong>012-345-6789<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>



    </div>
  </div>
</div>

<div class="container py-4">
  <div class="copyright">
    &copy; Copyright <strong><span>INTI College Penang</span></strong>. All Rights Reserved
  </div>



</div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </html>
