<?php
    session_start();
    $ide = $_GET['delete'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekat";

    $conn = new mysqli ($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id=$_SESSION['id'];
    $sql="DELETE FROM news where author=$id and id=$ide";
    $conn->query($sql);

    header("location: user.php");
    $conn->close();
?>
<!-- Decline! -->