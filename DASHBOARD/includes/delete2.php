<?php

$id = $_GET['id'];


include('connect.php');
$sql = "DELETE FROM tbl_students WHERE id = '$id'";
$result = $conn->query($sql);
header('location: ../students.php');
?>