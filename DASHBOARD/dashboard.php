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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Users</h2>
                        <a href="signup.php">Add Account</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Username</td>
                                <td>Password </td>
                                <td>Email </td>
                                <td colspan="1">Action</td>
                            </tr>
                        </thead>

                        <tbody>
                    <?php
                        include('includes/connect.php');
                                $sql = "SELECT * FROM tbl_web";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                            <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo str_repeat('*', strlen($row['password'])); ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><a href="includes/update.php?id=<?php echo $row["id"]; ?>"> <i class="material-icons">update</i></a></td>
                                <td><a href="includes/delete.php?id=<?php echo $row["id"]; ?>"> <i class="material-icons">delete</i></a></td>
                            </tr>
                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No Users Found</td></tr>";
                                    }
                                ?>
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
</body>

</html>
