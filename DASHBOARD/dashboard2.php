<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style_dashboard4.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <div class="user">
                                <img src="assets/imgs/sharingan.png" alt="">
                            </div>
                        </span>
                        <div class="admin">
                            <span class="title">Admin</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="dashboard2.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="evaluation.php">
                        <span class="icon">
                            <ion-icon name="laptop-outline"></ion-icon>
                        </span>
                        <span class="title">Evaluation</span>
                    </a>
                </li>
                <li>
                    <a href="attendancelayout.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="students.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Students</span>
                    </a>
                </li>
                <li>
                    <a href="subject.php">
                        <span class="icon">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class="title">Subject</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Users</h2>
                        <a href="signup.php">Add Account</a>
                    </div>

                        <tbody>
  
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================= Dashboard ==================== -->
            <div class="dashboard">
                <div class="card">
                    <h3>College Students Enrolled</h3>
                    <canvas id="collegeChart"></canvas>
                </div>
                <div class="card">
                    <h3>Senior High School Students Enrolled</h3>
                    <canvas id="shsChart"></canvas>
                </div>
                <div class="card">
                    <h3>Announcements / Programs</h3>
                    <p id="announcements">No announcements at the moment.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/js.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Chart.js Script -->
    <script>
        // Fetch data from database and populate the charts
        <?php
// Include your database connection
include('includes/connect.php');

// Fetch data for college students, including Electrical and Business
$collegeIT = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'college' AND department = 'IT'")->fetch_assoc()['count'];
$collegeEngineering = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'college' AND department = 'Engineering'")->fetch_assoc()['count'];
$collegeElectrical = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'college' AND department = 'Electrical'")->fetch_assoc()['count'];
$collegeBusiness = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'college' AND department = 'Business'")->fetch_assoc()['count'];

// Fetch data for Senior High School students, including Electrical and Business
$shsIT = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'shs' AND department = 'IT'")->fetch_assoc()['count'];
$shsEngineering = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'shs' AND department = 'Engineering'")->fetch_assoc()['count'];
$shsElectrical = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'shs' AND department = 'Electrical'")->fetch_assoc()['count'];
$shsBusiness = $conn->query("SELECT COUNT(*) AS count FROM tbl_students WHERE level = 'shs' AND department = 'Business'")->fetch_assoc()['count'];

?>


// College Students Chart
// College Students Chart
const collegeChart = document.getElementById('collegeChart').getContext('2d');
new Chart(collegeChart, {
    type: 'bar',
    data: {
        labels: ['IT', 'Engineering', 'Electrical', 'Business'],  // Added Electrical and Business
        datasets: [
            {
                label: 'College Students',
                data: [
                    <?php echo $collegeIT; ?>, 
                    <?php echo $collegeEngineering; ?>, 
                    <?php echo $collegeElectrical; ?>,   // Electrical department
                    <?php echo $collegeBusiness; ?>    // Business department
                ],  
                backgroundColor: 'rgba(253, 5, 5, 0.56)',
                borderColor: 'rgb(108, 3, 3)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
            }
        },
        aspectRatio: 5,  // Adjust the aspect ratio if you want to change width/height proportion
        layout: {
            padding: {
                top: 20, // Adjust the padding around the chart
                left: 20,
                right: 20,
                bottom: 20
            }
        }
    }
});

new Chart(shsChart, {
    type: 'bar',
    data: {
        labels: ['IT', 'Engineering', 'Electrical', 'Business'],  // Label departments
        datasets: [
            {
                label: 'Senior High School Students',
                data: [<?php echo $shsIT; ?>,<?php echo $shsEngineering; ?>,<?php echo $shsElectrical; ?>, <?php echo $shsBusiness; ?>],  // Show total count of students
                backgroundColor: 'rgba(113, 43, 252, 0.43)',
                borderColor: 'rgb(61, 2, 179)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
            }
        },
        aspectRatio: 5,  // Adjust the aspect ratio if you want to change width/height proportion
        layout: {
            padding: {
                top: 20, // Adjust the padding around the chart
                left: 20,
                right: 20,
                bottom: 20
            }
        }
    }
});

</script>
