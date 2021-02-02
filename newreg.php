<?php
session_start();
if(isset($_POST['fname'])&&isset($_POST['confirm'])){
$_SESSION['membership'] = 'true';
$_SESSION['status'] = 'Congragulations!
Your Membership Request is being Processed. You will be contated by our representative soon.';
header( 'Location: membership.php' ) ;
return;
}
if(isset($_POST['deny'])){
  header( 'Location: membership.php' ) ;
  return;
}
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <title>New Member</title>
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
     <h1>Hospital Management System | New Membership</h1>
   </div>
   <div class="navbar">
     <a href="about_us.html" class="right">ABOUT US</a>
     <a href="membership.php" class="right">LOGIN AS MEMBER</a>
     <a href="index.html" class="right">HOME</a>
   </div>
   <div class="main">
     <h2>Confirm Your New Membership</h2>
<p><i>Your data is taken from your previous appointments as per your consent</i></p>
     <form action="newreg.php" method="POST">

       <b>Please type your full name (first, middle and last)</b>
       <br><br>
       <input style="width: 400px; height: 30px;" type="text" name="fname" placeholder="Full Name as --
       First   Middle   Last" >
       <br><br>
       <p>Check confirm or deny for membership</p>
       <!-- <label for="Blood_group"><strong>Blood_Group:</strong> </label> -->
       <br>
       <input type="radio"  name="confirm" value="confirm">
<label for="confirm">Confirm</label><br>
<input type="radio"  name="deny" value="deny">
<label for="deny">Deny</label><br>
           <br><br>
       <input class="button" type="submit" name="submit" value="Submit">
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
