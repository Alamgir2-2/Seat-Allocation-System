<?php


include('../database/dbConn.php');


$query = "SELECT * FROM `Dept`";
$result = mysqli_query($conn, $query);


$data = array();


while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


mysqli_close($conn);


header('Content-Type: application/json');
echo json_encode($data);
?>