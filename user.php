
<!DOCTYPE HTML5>
<html lang="en">
  <head>
    <title>Sign</title>
    <meta charset="utf-8">
    <style>
      .header {
        position: fixed;
        background-color: green;
        text-align: center;
        font-size: 35px;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        top: 0;
        left: 0;
        right: 0;
      }
      .footer{
        position: fixed;
        background-color: green;
        padding: 30px;
        bottom: 0;
        left: 0;
        right: 0;
        margin-bottom: 0px;
        text-align: center;
        color: white;
      }
      .content{
        position: relative;
        width: 100%;
        height: 69vh;
      }
      .add{
        background-color: #f2f2f2;
        position: absolute;
        width: 24%;
        height: 62vh;
        margin-top: 3vh;
        margin-left: 10vh;
        text-align: center;
        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
      }
      .table{
        position: absolute;
        background-color: #f2f2f2;
        width: 32%;
        height: 62vh;
        margin-top: 3vh;
        margin-left: 60vh;
        text-align: center;

        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
      }
      .anotherTable{
        position: absolute;
        background-color: #f2f2f2;
        width: 33%;
        height: 62vh;
        margin-top: 3vh;
        margin-left: 125vh;
        text-align: center;

        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
      }
      .logoutBtn{
        position: relative;
      }

      #myInput {
        width: 89%;
        margin-top: 3vh;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
      }
      table {
        width:95%;
        margin-left: 3vh;
      }
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 15px;
        text-align: left;
      }
      tr:nth-child(even) {
        background-color: #eee;
      }
      tr:nth-child(odd) {
      background-color: #fff;
      }
      th {
        background-color: grey;
        color: black;
      }
      .inpLog{
        position: relative;
        width:80%;
        margin: 8px;
        padding: 1vh;
        margin-left:5vh;
        margin-right:5vh;
        font-size: 2vh;
      }
      button{
        position: relative;
        width:87%;
        padding: 1vh;
        margin-left: 1.5vh;
        font-size: 2vh;
        margin-bottom: 0vh;
      }
      .smallBtn{
        position: relative;
        color: black;
        text-align: center;
      }
      .lout{
        background-color: lime;
      }
      
      a:hover {
        background-color: yellow;
      }

    </style>
  </head>
  <body>
    <?php
      session_start();
      if(empty($_SESSION["id"])){
        header("location:/projekat");
        exit;
      }
    ?>
    <div class="header">
      <h2>Spread the Voice</h2>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="content">
        <a class="lout" href="logout.php">Log Out</a>
      <div class="add">
        <h1>Add event</h1>
        <br><br><br><br><br>
        <form name="formReq" action="sendReq.php" method="post">
          <label for="title">Title</label>
          <input type="text" name="title" placeholder="Enter Title..." class="inpLog">
          <br><br>
          <label for="desc">Description</label>
          <input type="text" name="desc" placeholder="Enter Description..." class="inpLog">
          <br><br><br><br>
          <button onClick="if(!validateForm()){event.preventDefault();}else{alert('Successfully changed!');}" type="submit">POST</button>
        </form>
      </div>
      <div class="table">
        <h1>Your events</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <table id="myTable">
          <tr class="head">
            <th style="width:10%;">ID</th>
            <th style="width:20%;">Title</th>
            <th style="width:50%">Description</th>
            <th style="width:10%">Edit</th>
            <th style="width:10%">Delete</th>
          </tr>
          
          <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projekat";
            $list = "test";
            $conn = new mysqli ($servername, $username, $password, $dbname);

            if($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $fetched = $conn->query("SELECT * FROM news WHERE author = $_SESSION[id]");
            while($row = $fetched->fetch_assoc()):
          ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <td><a href="editArea.php?edit=<?php echo $row['id']?>"><input type="button" class="smallBtn" value="EDIT"></a></td>
            <td><a href="delete.php?delete=<?php echo $row['id']?>"><input type="button" clas="smallBtn" value="DELETE"></a></td>
          </tr>

          <?php endwhile; ?>

        </table>
      </div>
      <div class="anotherTable">
        <h1>All events</h1>
        <table id="myTable">
          <tr class="head">
            <th style="width:10%;">ID</th>
            <th style="width:40%;">Title</th>
            <th style="width:50%">Description</th>
          </tr>
          
          <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projekat";
            $list = "test";
            $conn = new mysqli ($servername, $username, $password, $dbname);

            if($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $fetched = $conn->query("SELECT * FROM news");
            while($row = $fetched->fetch_assoc()):
          ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
          </tr>

          <?php endwhile; ?>

        </table>
      </div>
    </div>
    <div class="footer">
    <!-- <h2>Spread The Voice and post your choice.</h2> -->
    </div>
    <script>
      function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

      function validateForm() {
        var title = document.forms["formReq"]["title"].value;
        var desc = document.forms["formReq"]["desc"].value;
        if (title == "" || desc == "") {
          alert("Please fill out all of the fields before submiting.");
          return false;
        }
        return true;
        
      }
    </script>
    
  </body>
</html>
<!-- user -->