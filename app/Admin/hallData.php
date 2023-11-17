<?php

include('../database/dbConn.php');


$query = "SELECT * FROM `Hall`";
$result = mysqli_query($conn, $query);


$data = array();

// Fetch each row and add it to the array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


mysqli_close($conn);

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>