<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot Password</title>
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
            button{
                position: relative;
                width:87%;
                padding: 1vh;
                margin-left: 1.5vh;
                font-size: 2vh;
                margin-bottom: 0vh;
            }
            .mainArea{
                background-color: #f2f2f2;
                position: absolute;
                width: 30%;
                height: 62vh;
                margin-top: 3vh;
                margin-left: 69vh;
                text-align: center;
                border-radius: 20px;
                box-shadow: rgba(0,0,0,0.8) 0 0 10px;
                border-collapse: collapse;
        
            }
            .inpForPass{
                position: relative;
                width:80%;
                margin: 8px;
                padding: 1vh;
                margin-left:5vh;
                margin-right:5vh;
                font-size: 2vh;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>Spread The Voice</h2>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="content">
            <div class="mainArea">
                <h1>Forgot Password</h1>
                <form name="formNew" action="change.php" method="post">
                    <label for="userName">User</label>
                    <input type="text" name="userName" placeholder="Enter Username..." required class="inpForPass">
                    <br><br>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="Enter E-mail..." required class="inpForPass">
                    <br><br>
                    <label for="newPass">New Password</label>
                    <input type="password" name="newPass" placeholder="Enter New Password..." required class="inpForPass">
                    <br><br>
                    <label for="repNewPass">New Password</label>
                    <input type="password" name="repNewPass" placeholder="Repeat New Password..." required class="inpForPass">
                    <br><br><br><br>
                    <button onClick="if(!validateForm()){event.preventDefault();}else{alert('Successfully changed!')}" type="submit">Change</button>
                </form>
            </div>
        </div>
        <div class="footer">
            <h2>Spread The Voice and post your choice.</h2>
        </div>
    </body>
</html>
<script>

function validateForm() {
  var user = document.forms["formNew"]["userName"].value;
  var email = document.forms["formNew"]["email"].value;
  var pass = document.forms["formNew"]["newPass"].value;
  var passw = document.forms["formNew"]["repNewPass"].value;
  if (user == "" || email == "" || pass == "" || passw == "") {
    alert("Please fill out all of the fields before submiting.");
  } 
  if(pass != passw){
    alert("Passwords didn't match. Please try again.");
    return false;
  }
  return true;
  
}
</script>
<!-- newPass -->