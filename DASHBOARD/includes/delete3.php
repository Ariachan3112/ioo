<?php

$id = $_GET['id'];


include('connect.php');
$sql = "DELETE FROM subjects WHERE id = '$id'";
$result = $conn->query($sql);
header('location: ../subject.php');
?>