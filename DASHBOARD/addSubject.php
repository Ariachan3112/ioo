<?php
    include('includes/connect.php');

if(isset($_POST['add_subject'])){
    $id = $_POST['id'];
    $setsem = $_POST['setsem'];
    $scode = $_POST['scode'];
    $sname = $_POST['sname'];
    $settime = $_POST['settime'];
    $setday = $_POST['setday'];
    $tname = $_POST['tname'];

    $sql = "INSERT INTO info (id, setsem, scode, sname, settime, setday, tname)
    VALUES ('$id', '$setsem', '$scode', '$sname', '$settime', '$setday', '$tname')";

if ($conn->query($sql) === TRUE) {
    echo "<p>New subject added successfully!</p>";
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
    <link rel="stylesheet" href="assets/css/style_subjectbox.css">
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
                        <span class="title">Subject</span>
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
            <div class="w6-card-4">
  <div class="w6-container w6-indigo">
    <h2>Add New Subject</h2>
  </div>
                <form action="" method="post" class="add-subject" enctype="multipart/form-data">      
                <label class="w6-text-indigo"><b>School Year</b></label>
                <input class="w6-input w6-border w6-white" name="id" type="text"required></p><p>      
                <label class="w6-text-indigo"><b>Semester</b></label>
                <input class="w6-input w6-border w6-white" name="setsem" type="text"required></p><p>      
                <label class="w6-text-indigo"><b>SubjectCode</b></label>
                <input class="w6-input w6-border w6-white" name="scode" type="text"required></p>
                <label class="w6-text-indigo"><b>SubjectName</b></label>
                <input class="w6-input w6-border w6-white" name="sname" type="text"required></p>
                <label class="w6-text-indigo"><b>Time</b></label>
                <input class="w6-input w6-border w6-white" name="settime" type="text"required></p>
                <label class="w6-text-indigo"><b>Day</b></label>
                <input class="w6-input w6-border w6-white" name="setday" type="text"required></p>
                <label class="w6-text-indigo"><b>Teacher</b></label>
                <input class="w6-input w6-border w6-white" name="tname" type="text"required></p>
                <button class="w6-btn w6-indigo" name="add_subject">Register </button>
            </p>
  </form>

                </div>
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