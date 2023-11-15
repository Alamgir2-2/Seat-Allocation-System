<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
    $room_num = $_POST['room_num'];
    $num_table = $_POST['num_table'];
    $bed = $_POST['bed'];
    $floor = $_POST['floor'];



    $check_query = "SELECT * FROM `rooms` WHERE room_num = '$room_num'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        echo $return = 'duplicate';

    } else {
        $query = "INSERT INTO `rooms` (`room_num`, `num_table`, `bed`, `floor`) VALUES ('$room_num','$num_table', '$bed', '$floor')";
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
    $room_num = $_POST['room_num'];
  
    $delete_query     = "DELETE FROM `rooms` WHERE room_num = $room_num";
    $delete_query_run = mysqli_query($conn, $delete_query);
  
    if ($delete_query_run) {
      echo $return = "Delete Successfully !";
    } else {
      echo $return = "Error";
    }
  }
?>