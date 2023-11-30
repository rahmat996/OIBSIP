<?php
$username = "root";
$server = "localhost";
$password = "";
$database = "user_form";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error" . mysqli_connect_error());
}
?>