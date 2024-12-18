<?php
include('includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert the request into the requests table
    $sql = "INSERT INTO requests (username, email, status) VALUES ('$username', '$email', 'pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Request submitted successfully. Please wait for approval.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
