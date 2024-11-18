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
        <h1 class="text-light"><a href="main.php"><span>LOGO</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>


    <title>Internship Vacancy Portal</title>
    <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto active" href="{{ route('main') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
          <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>

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

</header>
    <!--introduction section-->
<!--<section id="intro" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>INTI Online Internship Vancancy Portal</h1>
          <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas ex temporibus suscipit beatae aliquid dolor quas dolores quisquam reprehenderit incidunt. Tenetur autem sapiente veritatis accusantium maiores veniam ad quaerat voluptatum.</h2>
          <div>
            <a href="#search" class="btn-get-started scrollto">Find Job Now</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 intro-img">
          <img src="img/job2.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>
  -->

    <!--search and filter section-->
  <section id="search" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
      <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center">
      <div class="m-auto">
                <h2>Search for Jobs</h2>
                <br>
               <div>
                <form action="{{ route('job.result') }}" method="GET" class="search-form">
                <input type="search" class="form-control" id="email" placeholder="Search" name="search"  value="{{ request('search') }}">
                <input type="location" class="form-control" id="location" placeholder="Location" name="location" value="{{ request('location') }}">
                <select name="status" id="status" placeholder="Job Categories">
                  <option value="">Select Category</option>
                  <option value="Accounting" {{ request('category') == 'Accounting' ? 'selected' : '' }}>Accounting</option>
                  <option value="IT" {{ request('category') == 'IT' ? 'selected' : '' }}>IT</option>
                  <option value="Marketing" {{ request('category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                  <option value="Engineering" {{ request('category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                  <option value="Hospitality" {{ request('category') == 'Hospitality' ? 'selected' : '' }}>Hospitality</option>
                  <option value="HR" {{ request('category') == 'HR' ? 'selected' : '' }}>HR</option>
                  <option value="Customer Service" {{ request('category') == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
            </select>
            <button type="submit" class="btn btn-info">Search</button>
          </form>
               </div>
             </div>
         </div>
      </div>
    </div>
  </section>




<!--Jobs option section-->
<section id="intro" class="d-flex align-items-center">
  <div class="container">
    <div class="row gy-4">
      <h2>Available Jobs</h2>
      <div class="col-lg-6 order-2 order-lg-1 d-flex">
        <!-- Updated Carousel for Bootstrap 5 -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach ($jobs as $index => $job)
              <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="cards-wrapper">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $job->company_name }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $job->position }}</h6>
                      <p class="card-text">Allowance: ${{ $job->allowance }}</p>
                      <p class="card-text">Location: {{ $job->location }}</p>
                      <a href="#"
                      onclick="event.preventDefault(); document.getElementById('apply-form-{{ $job->id }}').submit();"
                      class="card-link">
                      Apply Now
                   </a>

                   <form id="apply-form-{{ $job->id }}" action="{{ route('jobs.apply', $job->id) }}" method="POST" style="display: none;">
                       @csrf
                   </form>                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <!-- Next and Previous Buttons -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



    <!--partner section-->
    <section id="partner" class="clients section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Company</h2>
          <p>They trusted us</p>
        </div>



      </div>
    </section><!-- End Clients Section -->



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


      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
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
