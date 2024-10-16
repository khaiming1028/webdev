<head>
    <div class="container">
    <h1>
        Edit Students
    </h1>
    </div>
   
</head>
<form method="post" action="" enctype="multipart/form-data" class="my-form">
    
        <div class="form-group">
            <label for="type">Student Name</label>
            <input type="text" name="student_name" id="student_name" placeholder="Student Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Student ID</label>
            <input type="text" name="student_id" id="student_id" placeholder="Student ID" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Programme</label>
            <input type="text" name="programme" id="programme" placeholder="Programme" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Contact</label>
            <input type="text" name="student_contact" id="student_contact" placeholder="Contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Status</label>
            <select name="status" id="status">
              <option value="approved">Approved</option>
              <option value="declined">Declined</option>
              <option value="pending">Pending</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Update Students" class="btn btn-primary">
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