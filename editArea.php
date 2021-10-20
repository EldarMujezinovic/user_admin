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
      .log{
        background-color: #f2f2f2;
        position: absolute;
        width: 30%;
        height: 62vh;
        margin-top: 3vh;
        margin-left: 65vh;
        text-align: center;
        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
  
      }
      button{
        position: relative;
        width:87%;
        padding: 1vh;
        margin-left: 1.5vh;
        font-size: 2vh;
        margin-bottom: 0vh;
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
    </style>
    <body>
        <div class="header">
            <h2>Spread The Voice</h2>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="content">
            <div class="log">
                <h1>Edit</h1>
                <br><br><br><br><br>
                <?php session_start(); $_SESSION['edit']=$_GET['edit'];?>
                <form action="edit.php" method="post">
                    <label for="options">Change</label>
                    <select name="options" class="inpLog">
                        <option>Title</option>
                        <option>Description</option>
                    </select>
                    <br><br>
                    <label for="new">Content</label>
                    <input type="text" name="new" placeholder="Enter new content..." required class="inpLog">
                    
                    <br><br><br><br>
                    <button type="submit">Change</button>
                </form>
            </div>
        </div>
        <div class="footer">
            <h2>Spread The Voice and post your choice.</h2>
        </div>
    </body>
</html>
<!-- EditArea -->