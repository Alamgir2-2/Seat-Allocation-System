<?php
session_start();
include('../database/dbConn.php');

$error_message = "";

if (isset($_POST['login'])) {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    $sql    = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        $_SESSION['logged_in'] = true;
        $_SESSION['email']    = $email;
        $_SESSION['password'] = $password;

        header("location: ../Admin/adminPannel.php");
    } else {
        $error_message = "Invalid email or password.";
    }
}

$conn->close();
?>