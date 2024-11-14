<head>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="https://kit.fontawesome.com/0d113d0983.js" crossorigin="anonymous"></script>
   
   
</head>

<div class="dashboard-header">
 <div class ="side-nav">
  <a href="#" class ="logo">
    <img src="img/inti4.png" class = "logo-img">
</a>
<ul class ="nav-links">
  <li><a href="dashboard.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i><p>Dashboard</p></a></li>
  <li><a href="job-upload.php"><i class="fa-solid fa-upload" style="color: #ffffff;"></i><p>Post a Job</p></a></li>
  <li><a href="view-job.php"><i class="fa-solid fa-display" style="color: #ffffff;"></i><p>View Job</p></a></li>
  <li><a href="view-student.php"><i class="fa-solid fa-user" style="color: #ffffff;"></i><p>View Student Application</p></a></li>
  <div class="active-dashboard"></div>
</ul>
</div>
    <form method="POST" action="{{route('job.store')}}" class="my-form">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category"  class="form-control">
                <option value="Accounting">Accounting</option>
                <option value="IT">IT</option>
                <option value="Marketing">Marketing</option>
                <option value="Engineering">Engineering</option>
                <option value="Hospitality">Hospitality</option>
                <option value="HR">HR</option>
                <option value="Customer Service">Customer Service</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="type">Company Name</label>
            <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Location</label>
            <input type="text" name="location" id="location" placeholder="Location" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Internship Position</label>
            <input type="text" name="position" id="position" placeholder="Internship Position" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Allowance</label>
            <input type="text" name="allowance" id="allowance" step="0.01" placeholder="Allowance" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Contact</label>
            <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Description</label>
            <input type="text" name="others" id="others" placeholder="Description" class="form-control">
        </div>
        <div class="form-group">
            <label for="job_status">Job Status</label>
            <select name="job_status" id="job_status"  class="form-control">
                <option value="Available">Available</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
       
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>



<style>
    .container {
        margin-top: 20px;
    }

    .my-form {
        max-width: 500px;
        margin: auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-control-file {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
    }
</style>