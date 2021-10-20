<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['eMail'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekat";

$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully <br>";
$sql = "INSERT INTO users VALUES(default,'$fname','$lname','$uname','$pass','$email')" or die($sql->error);
$conn->query($sql);
header("location:/projekat");
$conn->close();
?>
<!-- register -->