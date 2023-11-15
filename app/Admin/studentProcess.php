<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../database/dbConn.php');

if (isset($_POST['insert_data'])) {
    $stu_id = $_POST['stu_id'];
    $stu_name = $_POST['stu_name'];
    $dept = $_POST['dept'];
    $session = $_POST['session'];
    $hall = $_POST['hall'];
    $room = $_POST['room'];
    $block = $_POST['block'];


    $check_query = "SELECT * FROM `students` WHERE stu_id = '$stu_id'";
    $check_query_run = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        echo $return = 'duplicate';

    } else {
        $query = "INSERT INTO `students`(stu_id, stu_name, dept, session, hall, room, block) VALUES('$stu_id','$stu_name', '$dept', '$session', '$hall', '$room', '$block')";
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
    $stu_id = $_POST['stu_id'];
  
    $delete_query     = "DELETE FROM `students` WHERE stu_id = $stu_id";
    $delete_query_run = mysqli_query($conn, $delete_query);
  
    if ($delete_query_run) {
      echo $return = "Delete Successfully !";
    } else {
      echo $return = "Error";
    }
  }
?>