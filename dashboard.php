<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="dashboard-header">
        <div class="side-nav">
            <a href="#" class="logo">
                <img src="img/inti4.png" class="logo-img" alt="Logo">
            </a>
            <ul class="nav-links">
                <li><a href="dashboard.php"><i class="fa-solid fa-house"></i><p>Dashboard</p></a></li>
                <li><a href="job-upload.php"><i class="fa-solid fa-upload"></i><p>Post a Job</p></a></li>
                <li><a href="view-job.php"><i class="fas fa-desktop"></i><p>View Job</p></a></li>
                <li><a href="view-student.php"><i class="fa-solid fa-user"></i><p>View Student Application</p></a></li>
            </ul>
        </div>
        
        <div class="dashboard-charts">
            <div class="chart-container">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Chart 1
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart 2
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'My Second Dataset',
                    data: [28, 48, 40, 19, 86],
                    fill: false,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
