<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
    // $hall_id = $_POST['hall_id'];
    $hall_name = $_POST['hall_name'];
    $total_seat = $_POST['total_seat'];
    $avil_seat = $_POST['avil_seat'];
    $num_stu = $_POST['num_stu'];



    $check_query = "SELECT * FROM `halls` WHERE hall_name = '$hall_name'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        echo $return = 'duplicate';

    } else {
        $query = "INSERT INTO `halls` (`hall_name`, `total_seat`, `avil_seat`, `num_stu`) VALUES ('$hall_name', '$total_seat', '$avil_seat','$num_stu')";
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
    $hall_id = $_POST['hall_id'];
  
    $delete_query = "DELETE FROM `halls` WHERE hall_id = '$hall_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);
  
    if ($delete_query_run) {
      echo $return = "Delete Successfully !";
    } else {
      echo $return = "Error";
    }
  }
?>