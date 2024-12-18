<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style_dashboard3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
include('connect.php');

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM subjects WHERE id = ?");
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
    $id = htmlspecialchars($_POST['id']);
    $setsem = htmlspecialchars($_POST['setsem']);
    $scode = htmlspecialchars($_POST['scode']);
    $sname = htmlspecialchars($_POST['sname']);
    $settime = htmlspecialchars($_POST['settime']);
    $setday = htmlspecialchars($_POST['setday']);
    $tname = htmlspecialchars($_POST['tname']);
    $sql = "UPDATE subjects SET sem=?, subcode=?, subname=?, timee=?, dayy=?, teacher=? WHERE schoolyr=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $setsem, $scode, $sname, $settime, $setday, $tname, $id);
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
                <a href="../evaluation.php">
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

        <div class="w3-card-4">
            <div class="w3-container w3-indigo">
                <h2>Update Information</h2>
            </div>
            <form method="post" action="">
                <input required class="w3-input w3-border w3-white" name="id" type="text" value="<?php echo isset($row['schoolyr']) ? $row['schoolyr'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="setsem" type="text" value="<?php echo isset($row['sem']) ? $row['sem'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="scode" type="text" value="<?php echo isset($row['subcode']) ? $row['subcode'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="sname" type="text" value="<?php echo isset($row['subname']) ? $row['subname'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="settime" type="text" value="<?php echo isset($row['timee']) ? $row['timee'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="setday" type="text" value="<?php echo isset($row['dayy']) ? $row['dayy'] : ''; ?>" aria-label=".form-control-sm example">
                <input required class="w3-input w3-border w3-white" name="tname" type="text" value="<?php echo isset($row['teacher']) ? $row['teacher'] : ''; ?>" aria-label=".form-control-sm example">
                <input type="submit" name="btnSubmit" class="w3-btn w3-indigo" value="Update">
            </form>
        </div>
    </div>
</div>

<!-- =========== Scripts ========= -->
<script src="assets/js/main.js"></script>
<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
