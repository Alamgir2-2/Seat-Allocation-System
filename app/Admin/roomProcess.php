<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
  $room_number = $_POST['room_number'];
  $table_count = $_POST['table_count'];
  $bed = $_POST['bed'];
  $hall_id = $_POST['hall_id'];

  // Check if the selected hall_id exists in the Hall table
  $check_hall_query = "SELECT * FROM `Hall` WHERE `hall_id` = '$hall_id'";
  $check_hall_query_run = mysqli_query($conn, $check_hall_query);

  if (mysqli_num_rows($check_hall_query_run) > 0) {
    // Hall ID exists, proceed with the insert
    $check_query = "SELECT * FROM `Room` WHERE `room_number` = '$room_number'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';
    } else {
      $query = "INSERT INTO `Room` (`room_number`,`table_count`,`bed`,`hall_id`) VALUES ('$room_number','$table_count', '$bed', '$hall_id')";
      $query_run = mysqli_query($conn, $query);

      if ($query_run) {
        echo $return = 'success';
      } else {
        $return = "Error: " . mysqli_error($conn);
        echo $return; 
      }
    }
  } else {
    echo $return = 'error_hall_not_found';
  }
}





// Delete Data
if (isset($_POST['delete'])) {
  $room_number = $_POST['room_number'];

  $delete_query = "DELETE FROM `Room` WHERE room_number = $room_number";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }

}

?>