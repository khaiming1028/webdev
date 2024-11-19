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
    <form method="POST" action="{{ route('student.update', $student->id) }}" class="my-form" enctype="multipart/form-data">
        @csrf
            @method('put')
            <div class="form-group">
                <label for="type">Student Name</label>
                <input type="text" name="student_name" id="student_name" placeholder="Student Name" class="form-control"  value="{{$student->student_name}}">
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" id="student_id" placeholder="Student ID" class="form-control"  value="{{$student->student_id}}">
            </div>
            <div class="form-group">
                <label for="programme">Programme</label>
                <input type="text" name="programme" id="programme" placeholder="Programme" class="form-control"  value="{{$student->programme}}">
            </div>
            <div class="form-group">
                <label for="student_contact">Student Contact</label>
                <input type="text" name="student_contact" id="student_contact" placeholder="student_contact" class="form-control"  value="{{$student->student_contact}}">
            </div>
            <div class="form-group">
                <label for="resume">Resume</label>
                <input type="file" name="resume" id="resume" placeholder="Resume" class="form-control-file"  value="{{$student->resume}}">
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
