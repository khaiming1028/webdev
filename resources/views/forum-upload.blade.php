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
        <form method="POST" action="{{route('forum.store')}}" class="my-form">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="type">Forum Title</label>
                <input type="text" name="forums_title" id="forums_title" placeholder="Forum Title " class="form-control">
            </div>
            <div class="form-group">
                <label for="brand">Forum Content</label>
                <input type="text" name="forums_content" id="forums_content" placeholder="Forum Content" class="form-control">
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