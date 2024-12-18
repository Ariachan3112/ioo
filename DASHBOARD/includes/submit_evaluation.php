<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evaluation_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_name = $_POST['student_name'];
$teacher_name = $_POST['teacher_name'];
$course = $_POST['course'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];

$sql = "INSERT INTO evaluations (student_name, teacher_name, course, rating, comments)
VALUES ('$student_name', '$teacher_name', '$course', '$rating', '$comments')";

if ($conn->query($sql) === TRUE) {
    echo "Evaluation submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
