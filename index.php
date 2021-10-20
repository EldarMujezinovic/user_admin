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
        margin-left: 20vh;
        text-align: center;
        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
  
      }
      .reg{
        position: absolute;
        background-color: #f2f2f2;
        width: 30%;
        height: 62vh;
        margin-top: 3vh;
        margin-left: 115vh;
        text-align: center;

        border-radius: 20px;
        box-shadow: rgba(0,0,0,0.8) 0 0 10px;
        border-collapse: collapse;
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
      .inpReg{
        position: relative;
        width:80%;
        padding: 1vh;
        margin-left:5vh;
        margin-right:5vh;
      }
      button{
        position: relative;
        width:87%;
        padding: 1vh;
        margin-left: 1.5vh;
        font-size: 2vh;
        margin-bottom: 0vh;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <h2>User/Admin Form</h2>
    </div>
    <br><br><br><br><br><br><br><br>
    <div class="content">
      <div class="log">
        <h1>Login</h1>
        <br><br><br><br><br>
        <form name="formLog" action="login.php" method="post">
          <label for="user">User</label>
          <input type="text" name="user" placeholder="Enter Username..." required class="inpLog">
          <br><br>
          <label for="pass">Password</label>
          <input type="password" name="pass" placeholder="Enter Password..." required class="inpLog">
          <label for="hierarchy">Sign as</label>
          <select name="hierarchy" class="inpLog">
            <option>User</option>
            <option>Admin</option>
          </select>
          <a href="newPass.php">Forgot Password?</a>
          <br><br><br><br>
          <button onClick="if(!validateForm1()){event.preventDefault();}else{alert('Login successfull.')}" type="submit">Log In</button>
        </form>
      </div>
      <div class="reg">
      <h1>Register</h1>
        <form name="formReg" action="register.php" method="post">
          <label for="fname">First name</label>
          <input type="text" name="fname" placeholder="Enter first name..." class="inpReg">
          <br><br>
          <label for="lname">Last name</label>
          <input type="text" name="lname" placeholder="Enter last name..." class="inpReg">
          <br><br>
          <label for="uname">User name</label>
          <input type="text" name="uname" placeholder="Enter user name..." class="inpReg">
          <br><br>
          <label for="pass">Password</label>
          <input type="password" name="pass" placeholder="Enter password..." class="inpReg">
          <br><br>
          <label for="passw">Repeat Password</label>
          <input type="password" name="passw" placeholder="Repeat password..." class="inpReg">
          <br><br>
          <label for="eMail">E-mail</label>
          <input type="text" name="eMail" placeholder="Enter e-mail..." class="inpReg">
          <br><br>
          <button onClick="if(!validateForm()){event.preventDefault();}else{alert('Registration successfull.')}" type="submit" name="btn">Register</button>
        </form>
      </div>
    </div>
    <div class="footer">
      <!-- <h2>Spread The Voice and post your choice.</h2> -->
    </div>
  </body>
</html>

<script>

function validateForm() {
  var fname = document.forms["formReg"]["fname"].value;
  var lname = document.forms["formReg"]["lname"].value;
  var uname = document.forms["formReg"]["uname"].value;
  var pass = document.forms["formReg"]["pass"].value;
  var passw = document.forms["formReg"]["passw"].value;
  var email = document.forms["formReg"]["eMail"].value;
  if (fname == "" || lname == "" || uname == "" || pass == "" || passw == "" || email == "") {
    alert("Please fill out all of the fields before submiting registration.");
    return false;
  } 
  if(pass != passw){
    alert("Passwords didn't match. Please try again.");
    return false;
  }
  return true;
  
}
function validateForm1() {
  var user = document.forms["formLog"]["user"].value;
  var pass = document.forms["formLog"]["pass"].value;
  if (pass == "" || user == "") {
    alert("Please fill out all of the fields before submiting registration.");
    return false;
  }
  return true;
  
}
</script>
<!-- index -->