<?php
include('includes/connect.php');

if(isset($_POST['add_user'])){
    $lastname = $_POST['lname'];
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $semester = $_POST['sem'];
    $level = $_POST['syear'];
    $department = $_POST['dept'];
    $enrolled_date = $_POST['enrolled_date'];

    // Corrected SQL query with proper field names
    $sql = "INSERT INTO tbl_students (lastname, firstname, middlename, semester, level, department, enrolled_date)
    VALUES ('$lastname', '$firstname', '$middlename', '$semester', '$level', '$department', '$enrolled_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>New student added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets/css/style_dashboard4.css">
    <link rel="stylesheet" href="assets/css/style_addstudent.css">
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
                        <span class="title">Admin</span>
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
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="laptop-outline"></ion-icon>
                        </span>
                        <span class="title">Evaluation</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
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
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
            <div class="w5-card-4">
                <div class="w5-container w5">
                    <h2>Add New Student</h2>
                </div>
                <form action="" method="post" class="add-user" enctype="multipart/form-data">
                    <label class="w5-text-indigo">Last Name</label>
                    <input class="w5-input w5-border w5-white" name="lname" type="text" required></p>
                    <label class="w5-text-indigo">First Name</label>
                    <input class="w5-input w5-border w5-white" name="fname" type="text" required></p>
                    <label class="w5-text-indigo">Middle Name</label>
                    <input class="w5-input w5-border w5-white" name="mname" type="text" required></p>
                    <label class="w5-text-indigo">Semester</label>
                    <select id="choices" name="sem" class="dropdown">
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                    </select>
                    <label class="w5-text-indigo">Level</label>
                    <select id="choices" name="syear" class="dropdown">
                        <option value="college">college</option>
                        <option value="shs">shs</option>
                    </select>
                    <label class="w5-text-indigo">Department</label>
                    <select id="choices" name="dept" class="dropdown">
                        <option value="IT">IT</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Marine">Business</option>
                    </select>
                    <div class="form-group">
                        <label for="enrolled_date">Enrolled Date:</label>
                        <input type="text" id="enrolled_date" name="enrolled_date" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <button class="w5-btn w5-pink" name="add_user">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/js.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
