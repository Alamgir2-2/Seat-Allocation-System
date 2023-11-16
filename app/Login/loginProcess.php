<?php
session_start();
include('../database/dbConn.php');

$response = array("success" => false, "message" => "Invalid email or password.");

if (isset($_POST['login'])) {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    $sql    = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email']    = $email;
        $_SESSION['password'] = $password;

        $response["success"] = true;
        $response["message"] = "Login successful";
    }

    $conn->close();
}

header('Content-Type: application/json');
echo json_encode($response);
?>
