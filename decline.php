<?php 
    session_start();

    $id=$_GET['acceptId'];
    $author=$_GET['author'];
    $title=$_GET['title'];
    $description=$_GET['desc'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekat";
    $list = "test";
    $conn = new mysqli ($servername, $username, $password, $dbname);
    if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql1 = "delete from requests where id = $id";
    $conn->query($sql1);
    header("location:admin.php");
    $conn->close();
?>
<!-- Decline -->