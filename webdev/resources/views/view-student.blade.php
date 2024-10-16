<html>
    <head>
         <!--Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <title>
        Admin DashBoard
       </title> 

</div>
       <h1>
         List of Student
       </h1>
       
    </head>
<!-------------------------------------Start of Body--------------------------------------->
    <body>
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
       <th>Student Name</th> 
        <th>Student Number</th>
        <th>Programme</th>
        <th>Contact Number</th>
        <th>Job Status</th>
        <th></th>
    </tr>

    <!--Below Information will be fetch from db later-->
    <tr>
        <th>1</th>
        <th>John</th>
        <th>123456789</th>
        <th>BCTCUN</th>
        <th>1234567789</th>
        <th>Success</th>
        <th><a href="edit-student.php">edit</a></th>
    </tr>
   </table>
</div>
    </body>
<!-------------------------------------End of Body--------------------------------------->

</html>