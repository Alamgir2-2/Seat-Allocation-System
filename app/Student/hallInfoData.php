<?php
include("../database/dbConn.php");

function get_hall_info($conn) {
    $sql = "SELECT * FROM Hall";
    $result = $conn->query($sql);

    $hall_info = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hall_info[] = [
                'hall_name' => $row['hall_name'],
                'total_seat' => $row['total_seat'],
                'available_seat' => $row['available_seat'],
                'total_student' => $row['total_student'],
            ];
        }
    } else {
        return ['error' => 'No hall information found'];
    }

    return $hall_info;
}

$hall_info = get_hall_info($conn);


echo json_encode($hall_info);
?>
