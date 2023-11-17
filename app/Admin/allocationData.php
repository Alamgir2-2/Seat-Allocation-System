<?php

// // Include your database connection
include('../database/dbConn.php');


$query = "SELECT * FROM `Allocation`";
$result = mysqli_query($conn, $query);


$data = array();

// Fetch each row and add it to the array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($data);
?>