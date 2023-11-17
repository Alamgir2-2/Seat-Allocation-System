<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
  $student_id = $_POST['student_id'];
  $room_number = $_POST['room_number'];
  $hall_id = $_POST['hall_id'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Check if the selected student_id exists in the Student table
  $check_student_query = "SELECT * FROM `Student` WHERE `student_id` = '$student_id'";
  $check_student_query_run = mysqli_query($conn, $check_student_query);

  // Check if the selected room_number exists in the Room table
  $check_room_query = "SELECT * FROM `Room` WHERE `room_number` = '$room_number'";
  $check_room_query_run = mysqli_query($conn, $check_room_query);

  // Check if the selected hall_id exists in the Hall table
  $check_hall_query = "SELECT * FROM `Hall` WHERE `hall_id` = '$hall_id'";
  $check_hall_query_run = mysqli_query($conn, $check_hall_query);

  if (mysqli_num_rows($check_student_query_run) > 0 && mysqli_num_rows($check_room_query_run) > 0 && mysqli_num_rows($check_hall_query_run) > 0) {
    // Student ID, Room Number, and Hall ID exist, proceed with the insert
    $check_query = "SELECT * FROM `Allocation` WHERE `student_id` = '$student_id'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';
    } else {
      // Insert data into the allocation table
      $query = "INSERT INTO `Allocation` (`student_id`, `room_number`, `hall_id`, `start_date`, `end_date`) VALUES ('$student_id', '$room_number', '$hall_id', '$start_date', '$end_date')";
      $query_run = mysqli_query($conn, $query);

      if ($query_run) {
        echo $return = 'success';
      } else {
        $return = "Error: " . mysqli_error($conn);
        echo $return;
      }
    }
  } else {
    echo $return = 'error_data_not_found';
  }
}

// Delete Data
if (isset($_POST['delete'])) {
  $allocation_id = $_POST['allocation_id'];

  $delete_query = "DELETE FROM `Allocation` WHERE `allocation_id` = '$allocation_id'";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }
}
?>
