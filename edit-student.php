<html>
    <head>
    <title>
    Admin Dashboard
</title>

<div>
<div id="mySidenav" class="sidenav">
 <a href="dashboard.php">Home</a>
  <a href="job-upload.php">Post a job</a>
  <a href="view-job.php">View Posted Job</a>
  <a href="view-student.php">View Student Application</a>
</div>
    <h1>
        Edit Student 
    </h1>
    
</div>
    </head>

<!-------------------------------------Start of Body--------------------------------------->
<body>
<div>
 <form action="" method="get">
 <label for="student-name">Student name:</label>
   <input type="text">
   <br>
   <label for="mac-num">Student Number:</label>
   <input type="text">
   <br>
   <label for ="programme">Programme:</label>
   <input type="text">
   <br>
   <label for="gender">Contact</label>
   <input type="text">
  <br>
  <br>
  <label for="status">Job Status</label>
    <select name="status" id="status">
     <option value="success">Success</option>
     <option value="pending">Pending</option>
     <option value="decline">Decline</option>

    </select>
  <input type="submit" value="Submit">
 </form>
</div>
</body>
<!-------------------------------------End of Body--------------------------------------->

</html>
