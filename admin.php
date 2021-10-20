<!DOCTYPE html>
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
                width: 43%;
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
                width: 43%;
                height: 62vh;
                margin-top: 3vh;
                margin-left: 100vh;
                text-align: center;

                border-radius: 20px;
                box-shadow: rgba(0,0,0,0.8) 0 0 10px;
                border-collapse: collapse;
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
            .tab{

                margin-top: 8vh;
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
            .smallBtn{
                position: relative;
                color: black;
                text-align: center;
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
        <h2>Spread The Voice</h2>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="content">
            <a href="logout.php">logOut</a>
            <div class="add">
                <h1>All Events/News</h1>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <table id="myTable">
                    <tr>
                        <th style="width:10%;">ID</th>
                        <!--<th style="width:10%;">User</th>-->
                        <th style="width:20%;">Title</th>
                        <th style="width:50%">Description</th>
                    </tr>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "projekat";
                        $list = "test";
                        $conn = new mysqli ($servername, $username, $password, $dbname);
                        
                        if($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $result = $conn->query("SELECT * FROM news;");
                        while($row1 = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row1['id']?></td>
                        <!--<td><?//php echo $row1['author']?></td>-->
                        <td><?php echo $row1['title']?></td>
                        <td><?php echo $row1['description']?></td>
                    </tr>

                    <?php endwhile; ?>

                </table>

            </div>
            <div class="table">
                <h1>Requests</h1>
                <table id="myTable" class="tab">
                    <tr>
                        <th style="width:10%;">ID</th>
                        <!--<th style="width:10%;">User</th>-->
                        <th style="width:20%;">Title</th>
                        <th style="width:50%">Description</th>
                        <th style="width:10%">Accept</th>
                        <th style="width:10%">Decline</th>
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
                        $fetched = $conn->query("SELECT * FROM requests");
                        while($row1 = $fetched->fetch_assoc()):
                    ?>

                    <tr>
                        <td><?php echo $row1['id']?></td>
                        <!--<td><?php //echo $row1['author']?></td>-->
                        <td><?php echo $row1['title']?></td>
                        <td><?php echo $row1['descriptiontext']?></td>
                        <td><a href="accept.php?acceptId=<?php echo $row1['id']?>&author=<?php echo $row1['author']?>&title=<?php echo $row1['title']?>&desc=<?php echo $row1['descriptiontext']?>"><input class="smallBtn" type="button" value="ACCEPT"></a></td>
                        <td><a href="decline.php?acceptId=<?php echo $row1['id']?>&author=<?php echo $row1['author']?>&title=<?php echo $row1['title']?>&desc=<?php echo $row1['descriptiontext']?>"><input class="smallBtn" type="button" value="DECLINE"></a></td>
                    </tr>

                    <?php endwhile; ?>

                </table>
            </div>
        </div>
        <div class="footer">
            <h2>Spread The Voice and post your choice.</h2>
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
    </script>
    </body>
</html>
<!-- Admin -->