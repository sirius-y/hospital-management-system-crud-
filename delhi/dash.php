<?php
session_start();
// if(!isset($_SESSION['name'])){
//   die('ACCESS DENIED');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Actions</title>
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
  width: 6%;
}
.main {
  display: block;
  /* float:left; */
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
</head>
<body>

<div class="header">
  <h1>Hospital Management System | Admin Actions</h1>
</div>

<div class="navbar">
  <a href="about_us.html" class="right">ABOUT US</a>
  <a href="home.html" class="right">HOME</a>
  <a href="admin_login.html" class="right">LOGOUT</a>


</div>
<div class="main">

<br>
    <form action="/adbms project/delhi/doctor/doctor_h.php" method="POST">
        <b>Press button for Doctor Actions</b><br><br>
        <!-- <input style="width: 400px; height: 30px;" type = "text" name="id" placeholder="ID"> -->
        <br> <br>
        <input style="width: 100px" type="submit" class="button" value="Action">
        <!-- <form action="view.php" method="POST">
          <input style="width: 100px" type="submit" class="button" value="View Data"> -->
      </form>
    </form><br>
    <p>-------------------------------------------------------------------------------------</p>


      <form action="/adbms project/delhi/staff/staff_h.php" method="POST">
          <b>Press button for Staff Actions</b><br><br>
          <!-- <input style="width: 400px; height: 30px;" type = "text" name="id" placeholder="ID"> -->
          <br> <br>
          <input style="width: 100px" type="submit" class="button" value="Action">
          <!-- <form action="view.php" method="POST">
            <input style="width: 100px" type="submit" class="button" value="View Data"> -->
      </form><br>
      <p>-------------------------------------------------------------------------------------</p>


        <form action="/adbms project/delhi/patient/patient_h.php" method="POST">
            <b>Press button for Patient Actions</b><br><br>
            <!-- <input style="width: 400px; height: 30px;" type = "text" name="id" placeholder="ID"> -->
            <br> <br>
            <input style="width: 100px" type="submit" class="button" value="Action">
            <!-- <form action="view.php" method="POST">
              <input style="width: 100px" type="submit" class="button" value="View Data"> -->
        </form>
</div>
<div class="footer">
  <h2>Advance Database Management Project</h2>
  <p style="font-size: medium;">All rights reserved by respective Group members.</p>
</div>
</body>
</html>
