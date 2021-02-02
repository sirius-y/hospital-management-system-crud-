<?php
session_start();
if ( isset($_SESSION['status'])) {
    echo '<p style="color:purple">'.$_SESSION['status']."</p>\n";
    unset($_SESSION['status']);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Membership</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
.header {
  padding: 20px;
  text-align: center;
  background: #0e5792;
  color: white;
}
.header h1 {
  padding-top: 20px;
  font-size: 40px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
}
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}
.navbar a.right {
  float: right;
}
.navbar a:hover {
  background-color: rgb(247, 29, 29);
  color: black;
}
.button{
  padding: 8px;
  color: white;
  background-color: rgb(38, 94, 214);
  text-align: center;
  outline: 0;
  display: inline-block;
  border-radius: 10px;
  width: 15%;
}
.main {
  -ms-flex: 70%;
  flex: 70%;
  background-color: white;
  text-align: center;
  padding: 20px;
  size: 40px;
}
.footer {
  padding: 6px;
  text-align: center;
  background: #ddd;
}
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
<script>
  function validate(){
  var username = document.getElementById("ad_name").value;
  var password = document.getElementById("ad_pass").value;

  if ( username <= 10 && password == "member"){
  alert ("Login successfully");
  window.location = "member_h.php"; //Redirecting to other page.
  return false;
  }
  else{
  alert("Please enter correct details");
  }
  }
  function gotoreg(){
    window.location="/adbms project/newreg.php";
  }
  </script>
</head>
<body>

<div class="header">
  <h1>Hospital Management System | Membership</h1>
</div>

<div class="navbar">
  <a href="about_us.html" class="right">ABOUT US</a>
  <!-- <a href="Registration.php" class="right">REGISTRATION</a> -->
  <a href="index.html" class="right">HOME</a>

</div>

  <div class="main">
    <h2>Welcome Member</h2>
   <p><i>Existing members are provided with details on their email</i></p>
   <br>
    <form  method="POST">
    <b>Your ID</b>
    <br>
    <input style="width: 400px; height: 30px;" type = "text" name="name" id="ad_name" placeholder="Login ID">
    <br><br>
    <b>Password</b>
    <br>
    <input style="width: 400px; height: 30px;" type="password" name="pass" id="ad_pass" placeholder="Password">
    <br><br>
  <input type="button" class="button" value="Login" id="submit"onclick="validate()">
  <input type="button" class="button" value="New Membership" onclick="gotoreg()">
</form>
  </div>
  <div class="main">
    <h4>For Any Queries Feel Free to Contact Us</h4>
    <p>24/7 Helpdesk: +12345567890</p>
    <p>Appointment: +91 12345567890</p>
    <p>Miscellaneous Queries: +91 0987654321</p>
  </div>
<div class="footer">
  <h2>Hospital Management System Project</h2>
  <p style="font-size: medium;">All rights reserved by respective Group members.</p>
</div>
</body>
</html>
