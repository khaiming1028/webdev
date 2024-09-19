<head>
    <div class="container">
    <h1>
        Upload Job
    </h1>
    </div>
   
</head>
<form method="post" action="" enctype="multipart/form-data" class="my-form">
    
        <div class="form-group">
            <label for="type">Company Name</label>
            <input type="text" name="name" id="name" placeholder="Company Name" class="form-control">
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
            <input type="text" name="allowance" id="allowance" placeholder="Allowance" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Description</label>
            <input type="text" name="description" id="brand" placeholder="Brand" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Contact</label>
            <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Upload" class="btn btn-primary">
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