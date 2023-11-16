<?php
include("../database/dbConn.php");

function get_students_in_room($roomNumber, $conn) {
    $sql = "SELECT * FROM students WHERE room = '" . $roomNumber . "'";
    $result = $conn->query($sql);

    $students = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = [
                'stu_name' => $row['stu_name'],
                'dept' => $row['dept'],
                'session' => $row['session'],
                'hall' => $row['hall'],
            ];
        }

        $count = count($students);
    } else {
        return ['error' => 'No students found in the specified room'];
    }

    return ['count' => $count, 'students' => $students];
}

if (isset($_GET['roomNumber'])) {
    $roomNumber = $_GET['roomNumber'];
    $students_in_room = get_students_in_room($roomNumber, $conn);

    // Return the data as JSON
    echo json_encode($students_in_room);
} else {
    // Handle invalid or missing parameters
    echo json_encode(['error' => 'Invalid request']);
}
?>
