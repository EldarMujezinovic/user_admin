<?php
    session_start();
    $ide = $_SESSION['edit'];
    $options = $_POST['options'];
    $content = $_POST['new'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekat";
    
    $conn = new mysqli ($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id=$_SESSION['id'];

    if($options == "Title"){
        $sql="update news set title = '$content' where author='$id' and id='$ide'";
    } else if($options == "Description"){
        $sql="update news set description = '$content' where author='$id' and id='$ide'";
    }
    echo $sql;
    
    $conn->query($sql);

    header("location: user.php");
    $conn->close();

    

?>
<!-- Edit -->