<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "seat_allocation_system";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("Connection Failed !!".mysqli_connect_error());
}
else{
    echo "Connect Successfully";
}
?>