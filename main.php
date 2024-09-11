<html>
    <head>
        

    <title>Internship Vacancy Portal</title>
    <nav id= "navbar" class="navbar">
        <ul>
      <li><a class="nav-link scrollto" href="main.php">Home</a></li>
      <li><a class="nav-link scrollto" href="forum.php">Forum</a></li>
      <li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
      <li><a class="nav-link scrollto" href="signup.php">Sign up</a></li>
      <li><a class="nav-link scrollto" href="#login">Log in</a></li>
        </ul>
</nav>
<!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--CSS Main Template Link-->
<link rel="stylesheet" href="css/style.css">
    </head>

    <!-------------------------------------Start of Body--------------------------------------->
    <body>
    <!--search and filter section-->
    <section id="search" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
         <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
             <div>
                <h2>Search for Jobs</h2>
               <div class="container">
                <form class="search-form">
                <input type="text" value="Search....">
                <input type="text" value="location">
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
   

<!--introduction section-->
<section class="d-flex align-items-center">
<div class="container">

<div class="row justify-content-between">
  <div class="col-lg-5 d-flex align-items-center justify-content-center">
      <h1>This is a Introduction Section</h1>
</div>
</div>
</div>
</section>

<!--Jobs option section-->
    <section class="d-flex align-items-center">
    <div class ="container">
        <h1>Jobs available</h1>
        <div>
            <p>
                <a href="job-details.php">Content</a>
            </p>
        </div>
    </div>
    </section>

    <!--partner section-->
    <section class="d-flex align-items-center">
        <div class="container">
            <h1>Partner Section with sliders</h1>
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
    </html>
