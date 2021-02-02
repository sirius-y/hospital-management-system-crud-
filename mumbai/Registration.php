<?php
session_start();
require_once "pdo.php";
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Entry</title>
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
      background: #d41857;
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

    .button {
      padding: 8px;
      color: white;
      background-color: rgb(16, 75, 201);
      text-align: center;
      outline: 0;
      display: inline-block;
      border-radius: 10px;
      width: 6%;
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
</head>

<body>
  <div class="header">
    <h1>Hospital Management System | Data Entry</h1>
  </div>
  <div class="navbar">
    <a href="about_us.html" class="right">ABOUT US</a>
    <a href="admin_login.html" class="right">ADMIN</a>
    <a href="home.html" class="right">HOME</a>
  </div>

  <div class="main">
    <h2>Patient Registration Form</h2>

    <form action="insert.php" method="POST">

      <b>First Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="fname" placeholder="first name" required>
      <br><br>
      <b>Middle Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="mname" placeholder="middle name" required>
      <br><br>
      <b>Last Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="lname" placeholder="last name" required>
      <br><br>
      <b>Residential Address</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="address" placeholder="full Address" required>
      <br><br>
      <b>Contact Number</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="phone number" required>
      <br><br>
      <b>Email</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id" required>
      <br><br>

      <label for="birthday"><b>Date of Birth</b></label>
      <br>
       <input style="width: 400px; height: 30px;" type="date" id="birthday" name="birth date" required>
      <br><br>

      <b>Appointment Description</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="description" placeholder="Appointment Description" required>
      <br><br>
      <b>Past Medical History</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="past" placeholder="Past Medical History" required>
      <br><br>
      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <br><br>
      <label for="Blood_group"><strong>Blood_Group:</strong> </label>
      <br><br>
      <select name="blood" id="Blood_group">
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="B-">B-</option>
          <option value="AB+">A-</option>
          <option value="B-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
      </select><br><br>
      <label for="location"><strong>Location:</strong> </label>
      <br><br>
      <select name="location" id="location">
          <option value="Mumbai">Mumbai</option>
          <option value="Delhi">Delhi</option>
          <option value="Kolkata">Kolkata</option>

      </select><br><br>


      <input class="button" type="submit" name="submit" value="Save">
      <input class="button" type="button" value="Print" onclick="window.print()">
    </form>
  </div>
  </div>
  <div class="footer">
    <h2>Advance Database Management Project</h2>
    <p style="font-size: medium;">All rights reserved by respective Group members.</p>
  </div>
</body>

</html>
