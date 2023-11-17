<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');



if (isset($_POST['insert_data'])) {
  $block_id = $_POST['block_id'];
  $block    = $_POST['block'];


  $check_query = "SELECT * FROM `Block` WHERE block_id = '$block_id'";
  $check_query_run = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_query_run) > 0) {
      echo $return = 'duplicate';

  } else {
  $query = "INSERT INTO `Block` (`block_id`, `block`) VALUES ('$block_id','$block')";
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
  $block_id = $_POST['block_id'];

  $delete_query = "DELETE FROM `Block` WHERE block_id = $block_id";
  $delete_query_run = mysqli_query($conn, $delete_query);

  if ($delete_query_run) {
    echo $return = "Delete Successfully !";
  } else {
    echo $return = "Error";
  }
}
?>