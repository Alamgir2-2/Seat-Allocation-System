<?php
include("../database/dbConn.php");


$student_id = $_GET['student_id'];


$sql = "SELECT
            Student.name AS student_name,
            Student.session,
            Student.dept_id,
            Dept.dept_name,
            Hall.hall_name,
            Room.room_number
        FROM
            Allocation
            JOIN Student ON Allocation.student_id = Student.student_id
            JOIN Dept ON Student.dept_id = Dept.dept_id
            JOIN Hall ON Allocation.hall_id = Hall.hall_id
            JOIN Room ON Allocation.room_number = Room.room_number
        WHERE
            Allocation.student_id = $student_id";

$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = array(
            'student_name' => $row["student_name"],
            'dept_name' => $row["dept_name"],
            'session' => $row["session"],
            'hall_name' => $row["hall_name"],
            'room_number' => $row["room_number"]
        );
    }
} else {
    $response['error'] = "No results found for student_id: $student_id";
}


$conn->close();


echo json_encode($response);
?>
