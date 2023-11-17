<?php

// // Include your database connection
include('../database/dbConn.php');

$query = "SELECT * FROM `Student`";
$result = mysqli_query($conn, $query);


$data = array();


while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);
 
// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>