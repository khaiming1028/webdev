<html>
    <head>
        <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <title>
        Admin DashBoard
       </title> 

</div>
       <h1>
         List of Jobs
       </h1>
       
    </head>
<!-------------------------------------Start of Body--------------------------------------->
    <body>
    <div id="mySidenav" class="sidenav">
  <div id="mySidenav" class="sidenav">
 <a href="dashboard.php">Home</a>
  <a href="job-upload.php">Post a job</a>
  <a href="view-job.php">View Posted Job</a>
  <a href="view-student.php">View Student Application</a>
</div>

<div class="container">
   <table border ="1" class= "table table-striped">
    <tr>
      <th>#</th>

       <th>Company Name</th> 
    
        <th>Location</th>
    
        <th>Position</th>

        <th>Allowance</th>

        <th>Contact</th>

        <th>Others</th>

        <th></th>

    </tr>
<!--Below Information will be fetch from db later-->
    <tr>
        <th>1</th>
        <th>Intel</th>
        <th>Bayan Lepas</th>
        <th>Software Engineer</th>
        <th>1200</th>
        <th>12345678</th>
        <th>example/example/example</th>
        <th><a href="edit-job.php">Edit</a></th>

    </tr>
    <tr>
        <th>2</th>
        <th>Intel</th>
        <th>Bayan Lepas</th>
        <th>Software Engineer</th>
        <th>1200</th>
        <th>12345678</th>
        <th>example/example/example</th>
        <th><a href="edit-job.php">Edit</a></th>

    </tr>
    <tr>
        <th>3</th>
        <th>Intel</th>
        <th>Bayan Lepas</th>
        <th>Software Engineer</th>
        <th>1200</th>
        <th>12345678</th>
        <th>example/example/example</th>
        <th><a href="edit-job.php">Edit</a></th>

    </tr>
   </table>
</div>
    </body>
<!-------------------------------------End of Body--------------------------------------->

</html>