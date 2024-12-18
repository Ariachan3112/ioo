<?php

$id = $_GET['id'];


include('connect.php');
$sql = "DELETE FROM tbl_web WHERE id = '$id'";
$result = $conn->query($sql);
header('location: ../dashboard.php');
?>