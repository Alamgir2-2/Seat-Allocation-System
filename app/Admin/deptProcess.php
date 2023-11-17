<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');



if (isset($_POST['insert_data'])) {
  $dept_id = $_POST['dept_id'];
  $dept_name    = $_POST['dept_name'];


  $check_query = "SELECT * FROM `Dept` WHERE dept_id = '$dept_id'";
  $check_query_run = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';

  } else {
  $query = "INSERT INTO `Dept` (`dept_id`, `dept_name`) VALUES ('$dept_id','$dept_name')";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo $return = 'success';
  } else {
    $return = "Error";
  }

  }

}


//   Delete Data
if (isset($_POST['delete'])) {
  $dept_id = $_POST['dept_id'];

  $delete_query = "DELETE FROM `Dept` WHERE `dept_id` = $dept_id";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }
}
?>