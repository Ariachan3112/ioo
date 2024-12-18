<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style_dashboard4.css">
    <link rel="stylesheet" href="../assets/css/style_update1.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
include('connect.php');

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM tbl_students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
}

if (isset($_POST['btnSubmit'])) {
    $idnum = htmlspecialchars($_POST['idnum']);
    $lname = htmlspecialchars($_POST['lname']);
    $fname = htmlspecialchars($_POST['fname']);
    $mname = htmlspecialchars($_POST['mname']);
    $syear = htmlspecialchars($_POST['syear']);
    $sem = htmlspecialchars($_POST['sem']);
    $dept = htmlspecialchars($_POST['dept']);
    $sql = "UPDATE tbl_student SET lastname=?, firstname=?, middlename=?, schoolyear=?, semester=?, department=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $lname, $fname, $mname, $syear, $sem, $dept, $id);
    if ($stmt->execute()) {
        echo "Updated Successfully!";
    } else {
        echo "Error Occurred!: " . $stmt->error;
    }
}
?>
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <div class="user">
                            <img src="../assets/imgs/sharingan.png" alt="">
                        </div>
                    </span>
                    <div class="admin">
                        <span class="title">Admin</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="../dashboard2.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../dashboard.php">
                    <span class="icon">
                        <ion-icon name="laptop-outline"></ion-icon>
                    </span>
                    <span class="title">Evaluation</span>
                </a>
            </li>
            <li>
                <a href="../dashboard.php">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="title">Attendance</span>
                </a>
            </li>
            <li>
                <a href="../students.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Students</span>
                </a>
            </li>


            <li>
                    <a href="../subject.php">
                        <span class="icon">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </span>
                        <span class="title">Subject</span>
                    </a>
                </li>


            <li>
                <a href="../index.php">
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

        <div class="w4-card-4">
            <div class="w4-container">
                <h2>Update Information</h2>
                </div>
            <form method="post" action="">
                <label class="w5-text-indigo">ID Number</label>
                <input required class="w44-input w4-border w4-white" name="idnum" type="text" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>" readonly aria-label=".form-control-sm example">
                <label class="w5-text-indigo">Last Name</label>
                <input required class="w4-input w4-border w4-white" name="lname" type="text" value="<?php echo isset($row['lastname']) ? $row['lastname'] : ''; ?>" aria-label=".form-control-sm example">
                <label class="w5-text-indigo">First Name</label>
                <input required class="w4-input w4-border w4-white" name="fname" type="text" value="<?php echo isset($row['firstname']) ? $row['firstname'] : ''; ?>" aria-label=".form-control-sm example">
                <label class="w5-text-indigo">Middle Name</label>
                <input required class="w4-input w4-border w4-white" name="mname" type="text" value="<?php echo isset($row['middlename']) ? $row['middlename'] : ''; ?>" aria-label=".form-control-sm example">
                <label class="w5-text-indigo">Year Level</label>
                <select id="choices" name="syear" class="dropdown">
                     <option value="Grade 11">Grade 11</option>
                     <option value="Grade 12">Grade 12</option>
                     <option value="1st Year">1st Year</option>
                     <option value="2nd Year">2nd Year</option>
                     <option value="3rd Year">3rd Year</option>
                     <option value="4th Year">4th Year</option>
                  </select>
                <label class="w5-text-indigo">Semester</label>
                <select id="choices" name="sem" class="dropdown">
                     <option value="1st Semester">1st Semester</option>
                     <option value="2nd Semester">2nd Semester</option>
                  </select>

                <label class="w5-text-indigo">Department</label>
                <select id="choices" name="dept" class="dropdown">
                     <option value="IT">IT</option>
                     <option value="Engineering">Engineering</option>
                     <option value="Electrical">Electrical</option>
                     <option value="Marine">Marine</option>
                  </select>
                <input type="submit" name="btnSubmit" class="w4-btn" value="Update">
                
            </form>
            
        </div>
    </div>
</div>

<!-- =========== Scripts ========= -->
<script src="../assets/js/main.js"></script>
<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
