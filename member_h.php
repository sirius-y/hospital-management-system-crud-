<?php
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
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
    <h1>Hospital Management System | Member Dashboard</h1>
  </div>
  <div class="navbar">
    <a href="about_us.html" class="right">ABOUT US</a>
    <a href="membership.php" class="right">LOGOUT</a>

  </div>
  <div class"main">
  <h3> Your Membership is <span style="color:green"> ACTIVE </span><br><br>
    <p> Please contact our staff in order to terminate your membership</p>
  </div>
  <div class="main">
    <h4>Helpdesk</h4>
    <p>24/7 (Emergency Support): +12345567890</p>
    <p>Appointment: +91 12345567890</p>
    <p>Miscellaneous Queries: +91 0987654321</p>
  </div>
  <div class="footer">
    <h2>Advance Database Management Project</h2>
    <p style="font-size: medium;">All rights reserved by respective Group members.</p>
  </div>
</body>

</html>
