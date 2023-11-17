<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
  $hall_id = $_POST['hall_id'];
  $hall_name = $_POST['hall_name'];
  $total_seat = $_POST['total_seat'];
  $available_seat = $_POST['available_seat'];
  $total_student = $_POST['total_student'];
  $block_id = $_POST['block_id'];

  // Check if the selected block_id exists in the Block table
  $check_block_query = "SELECT * FROM `Block` WHERE `block_id` = '$block_id'";
  $check_block_query_run = mysqli_query($conn, $check_block_query);

  if (mysqli_num_rows($check_block_query_run) > 0) {
    // Block ID exists, proceed with the insert
    $check_query = "SELECT * FROM `Hall` WHERE `hall_id` = '$hall_id'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';
    } else {
      $query = "INSERT INTO `Hall` (`hall_id`, `hall_name`, `total_seat`, `available_seat`, `total_student`, `block_id`) VALUES ('$hall_id', '$hall_name', '$total_seat', '$available_seat', '$total_student', '$block_id')";
      $query_run = mysqli_query($conn, $query);

      if ($query_run) {
        echo $return = 'success';
      } else {
        $return = "Error: " . mysqli_error($conn);
      }
    }
  } else {
    echo $return = 'error_block_not_found';
  }
}


//   Delete Data
if (isset($_POST['delete'])) {
  $hall_id = $_POST['hall_id'];

  $delete_query = "DELETE FROM `Hall` WHERE `hall_id` = '$hall_id'";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }
}
?>