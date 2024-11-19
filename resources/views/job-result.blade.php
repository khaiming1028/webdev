<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings - Internship Vacancy Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Custom Styles for Job Listings */
        .job-listing {
            margin-bottom: 1.5rem;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .job-listing h5 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .job-listing p {
            font-size: 1rem;
            color: #555;
        }

        .job-listing .apply-btn {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .job-listing .apply-btn:hover {
            background-color: #0056b3;
        }

        .card-link {
            font-size: 1rem;
            text-decoration: none;
            color: #007bff;
        }

        .card-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header and Navbar -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="{{ route('main') }}"><span>LOGO</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('main') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('forum.view') }}">Forum</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('view.profile') }}">Profile</a></li>
                    <li><a class="nav-link scrollto" href="/  ">Sign up</a></li>
                    <li><a class="nav-link scrollto" href="#login">Log in</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-5">
        <h2>Job Listings</h2>

        @if($jobs->isEmpty())
            <p>No jobs found.</p>
        @else
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-md-6 col-lg-4">
                        <div class="job-listing">
                            <h5>Category: {{ $job->category }}</h5>
                            <p><strong>Company Name:</strong> {{ $job->company_name }}</p>
                            <p><strong>Position:</strong> {{ $job->position }}</p>
                            <p><strong>Location:</strong> {{ $job->location }}</p>
                            <p><strong>Description:</strong> {{ $job->others }}</p>
                            <p><strong>Allowance:</strong> {{ $job->allowance }}</p>
                            <a href="#" onclick="event.preventDefault(); console.log('Apply Now clicked'); document.getElementById('apply-form-{{ $job->id }}').submit();" class="card-link">
                                Apply Now
                            </a>
                            <form id="apply-form-{{ $job->id }}" action="{{ route('jobs.apply', $job->id) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>

</body>
</html>
