<html>
    <head>
<!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--CSS Main Template Link-->
<link rel="stylesheet" href="css/style.css">
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
    <nav id= "navbar" class="navbar">
        <ul>
      <li><a class="nav-link scrollto active" href="main.php">Home</a></li>
      <li><a class="nav-link scrollto" href="forum.php">Forum</a></li>
      <li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
      <li><a class="nav-link scrollto" href="signup.php">Sign up</a></li>
      <li><a class="nav-link scrollto" href="#login">Log in</a></li>
        </ul>
</nav>
</header>
    <!--introduction section-->
<section id="intro" class="d-flex align-items-center">
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

  </section><!-- End intro -->
   
    <!--search and filter section-->
    <section id="search" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
         <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
             <div>
                <h2>Search for Jobs</h2>
               <div class="container">
                <form class="search-form">
                <input type="search" class="form-control" id="email" placeholder="Search" name="search">
                <input type="location" class="form-control" id="location" placeholder="Location" name="location">
                <label for="job-category">Category</label>
                <select name="status" id="status" placeholder="Job Categories">
                <option value="success">Engineering</option>
                <option value="pending">Medical</option>
                <option value="decline">Information Technology</option>
            </select>
            <input type="submit" class="btn btn-info">
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
        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="cards-wrapper">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 1</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 3</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 4</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="cards-wrapper">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 5</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 6</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 7</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 8</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="cards-wrapper">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 9</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 10</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 11</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Card title 12</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div>
            </div>


          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


    <!--partner section-->
    <section id="search" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
         <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
             <div>
                <h2>Our Partner</h2>
               
             </div>
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
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus pariatur ipsa modi eligendi
         impedit cum rem placeat obcaecati! 
         In eos exercitationem quod fugiat aperiam culpa unde tempore debitis, atque pariatur!<br>
      <a href="mailto:hege@example.com">example@example.com</a></p>
    </div>
  </div>
 </div>
</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    </html>
