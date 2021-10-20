<?php
    session_start();
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekat";
    $conn = new mysqli ($servername, $username, $password, $dbname);
    
    if($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
    
    $foreignId=$_SESSION['id'];
    $sql = "INSERT INTO requests VALUES(default,$foreignId,'$title','$desc')";
    $conn->query($sql);
    header("location:user.php");
    $conn->close();
?>
<!-- sendReq -->