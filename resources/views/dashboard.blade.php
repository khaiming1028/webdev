<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="view-job-page">
        <!-- Sidebar -->
        <nav class="sidenav">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('job.view') }}">View Job List</a>
            <a href="{{ route('student.view') }}">View Student List</a>
            <a href="{{ route('job-applications.view') }}">View Job Applications</a>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1 class="mt-4">Admin Dashboard</h1>

            <div class="table-responsive container">


            <div class="row mt-5">
                <!-- Chart 1 -->
                <div class="col-md-6">
                    <h3>Student Applications</h3>
                    <canvas id="myChart1"></canvas>
                </div>

                <!-- Chart 2 -->
                <div class="col-md-6">
                    <h3>Overall Statistics</h3>
                    <canvas id="myChart2"></canvas>
                </div>

                <div class="col-md-6">
                    <h3>Forums Posted</h3>
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Fetch Data and Initialize Charts -->
    <script>
      fetch('{{ route('dashboard.data') }}')
    .then(response => response.json())
    .then(data => {
        // Chart 1: Job Applications
        const ctx1 = document.getElementById('myChart1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Accepted', 'Rejected', 'Pending'],
                datasets: [{
                    label: 'Job Applications',
                    data: [
                        data.jobApplications.accepted,
                        data.jobApplications.rejected,
                        data.jobApplications.pending
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Chart 2: Overall Statistics (Jobs, Users, and Applications)
        const ctx2 = document.getElementById('myChart2').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Jobs Published', 'Users Registered', 'Jobs Applied'],
                datasets: [{
                    label: 'Overview',
                    data: [
                        data.jobsPublished,
                        data.usersRegistered,
                        data.jobsApplied
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart 3: Forums Posted
        const ctx3 = document.getElementById('myChart3').getContext('2d');
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Forums Posted'],
                datasets: [{
                    label: 'Forums',
                    data: [data.forumPosted],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    })
    .catch(error => console.error('Error fetching dashboard data:', error));
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl7+P4p+Zp8+NStzEwFzCBnZPUsY+5QV7kGxQEL1DkDChFXuGQZ2wzw8U7m"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGmHRQsA0iZdF2oJKGL5tW9YzJzXnEAGkPrxKQ68V4Ax0VqGZ77+Kp9v9GQ"
            crossorigin="anonymous"></script>
</body>

</html>
