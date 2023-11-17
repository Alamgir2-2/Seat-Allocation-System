<?php
include("../database/dbConn.php");

// Get the room_number from user input
$roomNumber = $_GET['room_number']; // You should validate and sanitize user input to prevent SQL injection

// SQL query to fetch student information based on room_number
$sql = "SELECT
            Student.name AS student_name,
            Student.session,
            Dept.dept_name,
            Hall.hall_name
        FROM
            Allocation
            JOIN Student ON Allocation.student_id = Student.student_id
            JOIN Dept ON Student.dept_id = Dept.dept_id
            JOIN Hall ON Allocation.hall_id = Hall.hall_id
        WHERE
            Allocation.room_number = $roomNumber";

$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Add each row to the response array
        $response[] = array(
            'student_name' => $row["student_name"],
            'dept_name' => $row["dept_name"],
            'session' => $row["session"],
            'hall_name' => $row["hall_name"]
        );
    }
} else {
    $response['error'] = "No students found in Room $roomNumber";
}

// Close the database connection
$conn->close();

// Convert the response array to JSON and echo it
echo json_encode($response);
?>
