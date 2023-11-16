<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
    $block = $_POST['block'];
    $num_room = $_POST['num_room'];
    $kitchen = $_POST['kitchen'];
    $washroom = $_POST['washroom'];



    $check_query = "SELECT * FROM `block` WHERE block = '$block'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        echo $return = 'duplicate';

    } else {
        $query = "INSERT INTO `block` (`block`, `num_room`, `kitchen`, `washroom`) VALUES ('$block','$num_room', '$kitchen', '$washroom')";
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
  
    $delete_query     = "DELETE FROM `block` WHERE block_id = $block_id";
    $delete_query_run = mysqli_query($conn, $delete_query);
  
    if ($delete_query_run) {
      echo $return = "Delete Successfully !";
    } else {
      echo $return = "Error";
    }
  }
?>