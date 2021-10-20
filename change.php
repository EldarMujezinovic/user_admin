<?php
$user=$_POST['userName'];
$pass=$_POST['newPass'];
$email=$_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekat";

$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "update users set password = '$pass' where username='$user' and email='$email'";
$conn->query($sql);

header("location:/projekat");
$conn->close();

?>
<!-- Change -->