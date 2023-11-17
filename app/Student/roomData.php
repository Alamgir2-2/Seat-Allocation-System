<?php
include("../database/dbConn.php");


$roomNumber = $_GET['room_number']; 


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
    while ($row = $result->fetch_assoc()) {
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


$conn->close();


echo json_encode($response);
?>
