<?php
include('includes/connect.php');
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch college students
$collegeQuery = "SELECT * FROM tbl_students WHERE (level = 'college' AND (lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR department LIKE '%$search%'))";
$collegeResult = $conn->query($collegeQuery);
$collegeStudents = '';
while ($row = $collegeResult->fetch_assoc()) {
    $collegeStudents .= "<tr>
        <td>{$row['id']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['middlename']}</td>
        <td>{$row['semester']}</td>
        <td>{$row['level']}</td>
        <td>{$row['department']}</td>
        <td>{$row['enrolled_date']}</td>
        <td><a href='includes/update_student.php?id={$row["id"]}'> <i class='material-icons'>update</i></a></td>
        <td><a href='includes/delete2.php?id={$row["id"]}'> <i class='material-icons'>delete</i></a></td>
    </tr>";
}

// Fetch SHS students
$shsQuery = "SELECT * FROM tbl_students WHERE (level = 'shs' AND (lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR department LIKE '%$search%'))";
$shsResult = $conn->query($shsQuery);
$shsStudents = '';
while ($row = $shsResult->fetch_assoc()) {
    $shsStudents .= "<tr>
        <td>{$row['id']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['middlename']}</td>
        <td>{$row['semester']}</td>
        <td>{$row['level']}</td>
        <td>{$row['department']}</td>
        <td>{$row['enrolled_date']}</td>
        <td><a href='includes/update_student.php?id={$row["id"]}'> <i class='material-icons'>update</i></a></td>
        <td><a href='includes/delete2.php?id={$row["id"]}'> <i class='material-icons'>delete</i></a></td>
    </tr>";
}

// Return the results as JSON
echo json_encode([
    'college_students' => $collegeStudents,
    'shs_students' => $shsStudents
]);
?>

