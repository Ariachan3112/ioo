<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style_dashboard4.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                <li><a href="dashboard2.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
                <li><a href="evaluation.php"><span class="icon"><ion-icon name="laptop-outline"></ion-icon></span><span class="title">Evaluation</span></a></li>
                <li><a href="attendancelayout.php"><span class="icon"><ion-icon name="book-outline"></ion-icon></span><span class="title">Attendance</span></a></li>
                <li><a href="students.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Students</span></a></li>
                <li><a href="subject.php"><span class="icon"><ion-icon name="pencil-outline"></ion-icon></span><span class="title">Subject</span></a></li>
                <li><a href="index.php"><span class="icon"><ion-icon name="log-out-outline"></ion-icon></span><span class="title">Sign Out</span></a></li>
            </ul>
        </div>
        

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label>
                        <input type="text" id="search" placeholder="Search by Name or Department">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
            

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2 style="font-family:Perpetua">College Students</h2>
                        <a href="addStudents.php">Add New Student</a>
                    </div>
                    <!-- College Students Table -->
                    <table>
                        <thead>
                            <tr style="font-weight: bold;">
                                <td>Id Number</td>
                                <td>Last Name</td>
                                <td>First Name</td>
                                <td>Middle Name</td>
                                <td>Semester</td>
                                <td>Level</td>
                                <td>Department</td>
                                <td>Date</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="collegeTable">
                            <!-- Dynamic content for College students will be loaded here -->
                        </tbody>
                    </table>
                </div>

                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2 style="font-family:Perpetua">Senior High School Students</h2>
                    </div>
                    <!-- SHS Students Table -->
                    <table>
                        <thead>
                            <tr style="font-weight: bold;">
                                <td>Id Number</td>
                                <td>Last Name</td>
                                <td>First Name</td>
                                <td>Middle Name</td>
                                <td>Semester</td>
                                <td>Level</td>
                                <td>Department</td>
                                <td>Date</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="shsTable">
                            <!-- Dynamic content for SHS students will be loaded here -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/js.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <!-- AJAX Script -->
    <script>
        document.getElementById('search').addEventListener('input', function () {
            var search = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search_students.php?search=' + search, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Assuming the response contains both college and SHS student results
                    var response = JSON.parse(xhr.responseText);
                    // Update College students table
                    document.getElementById('collegeTable').innerHTML = response.college_students;
                    // Update SHS students table
                    document.getElementById('shsTable').innerHTML = response.shs_students;
                }
            };
            xhr.send();
        });

        // Load all students initially
        window.onload = function() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search_students.php?search=', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById('collegeTable').innerHTML = response.college_students;
                    document.getElementById('shsTable').innerHTML = response.shs_students;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
