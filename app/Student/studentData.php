<?php
include("../database/dbConn.php");

function get_student_info($stu_id, $conn) {
    $sql = "SELECT * FROM students WHERE stu_id = " . $stu_id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Assuming each student has a unique ID, so only one row is expected
        $row = $result->fetch_assoc();

        return $row;
    } else {
        return ['error' => 'Student not found'];
    }
}

if (isset($_GET['stu_id'])) {
    $stu_id = $_GET['stu_id'];
    $student_info = get_student_info($stu_id, $conn);

    // Return the data as JSON
    echo json_encode($student_info);
} else {
    // Handle invalid or missing parameters
    echo json_encode(['error' => 'Invalid request']);
}
?>
