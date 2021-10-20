<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
$userType=$_POST['hierarchy'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekat";
$list = "test";
$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

if($userType == "User"){
    $result = $conn->query("SELECT * FROM users WHERE username='$user' and password='$pass';");
} else if($userType == "Admin"){
    $result = $conn->query("SELECT * FROM admins WHERE username='$user' and password='$pass';");
}
while($row = $result->fetch_assoc()):
    if($row['username'] == $user && $row['password'] == $pass){
        session_start();
        $_SESSION['id']=$row['id'];
        if($userType == "User"){
            header("location:user.php");
        } else if($userType == "Admin"){
            header("location:admin.php");
        }
    }
endwhile;



?>
<!-- login -->