<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
  $student_id = $_POST['student_id'];
  $name = $_POST['name'];
  $session = $_POST['session'];
  $dept_id = $_POST['dept_id'];

  // Check if the selected hall_id exists in the Hall table
  $check_hall_query = "SELECT * FROM `Dept` WHERE `dept_id` = '$dept_id'";
  $check_hall_query_run = mysqli_query($conn, $check_hall_query);

  if (mysqli_num_rows($check_hall_query_run) > 0) {
    // Hall ID exists, proceed with the insert
    $check_query = "SELECT * FROM `Student` WHERE `student_id` = '$student_id'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';
    } else {
      $query = "INSERT INTO `Student` (`student_id`,`name`,`session`,`dept_id`) VALUES ('$student_id','$name', '$session', '$dept_id')";
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
  $student_id = $_POST['student_id'];

  $delete_query = "DELETE FROM `Student` WHERE student_id = $student_id";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }

}

?>