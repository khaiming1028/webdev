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

<div>
  <a href="{{route('job.create')}}">Create a Product</a>
</div>
<div class="container">
   <table border ="1" class= "table table-striped">
    <tr>
      <th>ID</th>

       <th>Company Name</th> 
    
        <th>Location</th>
    
        <th>Position</th>

        <th>Allowance</th>

        <th>Contact</th>

        <th>Others</th>

        <th></th>
        <th></th>

    </tr>
    @foreach ($jobs as $job)
    <tr>
        <th>{{$job ->id}}</th>
        <th>{{$job ->company_name}}</th>
        <th>{{$job ->location}} </th>
        <th>{{$job ->position}}</th>
        <th>{{$job ->allowance}}</th>
        <th>{{$job ->contact}}</th>
        <th>{{$job ->others}}</th>
        <th><a href="{{route('job.edit', ['job' => $job])}}">Edit</a></th>
        <th>
          <form method="post" action="{{route('job.destroy', ['job' => $job])}}">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
          </form>
        </th>
    </tr> 
    @endforeach
   </table>
</div>
    </body>
<!-------------------------------------End of Body--------------------------------------->

</html>