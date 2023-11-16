<?php
include("../database/dbConn.php");

function get_hall_info($conn) {
    $sql = "SELECT * FROM halls";
    $result = $conn->query($sql);

    $hall_info = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hall_info[] = [
                'hall_name' => $row['hall_name'],
                'total_seat' => $row['total_seat'],
                'avil_seat' => $row['avil_seat'],
                'num_stu' => $row['num_stu'],
            ];
        }
    } else {
        return ['error' => 'No hall information found'];
    }

    return $hall_info;
}

$hall_info = get_hall_info($conn);

// Return the data as JSON
echo json_encode($hall_info);
?>
