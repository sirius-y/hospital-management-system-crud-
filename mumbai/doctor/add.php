<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['fname']) || isset($_POST['email'])){
$sql = "INSERT INTO doctors (fname,mname,lname,gender,cont_no,practise,address,email)
VALUES (:fname,:mname,:lname,:gender,:cont_no,:practise,:address,:email)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':fname' => $_POST['fname'],
':mname' => $_POST['mname'],
':lname' => $_POST['lname'],
':gender' => $_POST['gender'],
':cont_no' => $_POST['phone'],
':practise' => $_POST['practise'],
':address' => $_POST['address'],
':email' => $_POST['email']));
$_SESSION['success'] = 'Record Added';
header( 'Location: doctor_h.php' ) ;
return;
}

?>

<html>
<link rel="stylesheet" href="style.css">
<div class="main">
    <h2>Doctor Registration Form</h2>

    <form action="add.php" method="POST">
      <!-- <b>Patient_Id</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="uid" placeholder="eg. E123" required>
      <br><br> -->
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
      <input style="width: 400px; height: 30px;" type="text" name="lname" placeholder="lastname" required>
      <br><br>
      <b>Residential Address</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="address" placeholder="full Address" required>
      <br><br>
      <b>Contact Number</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="ph.number" required>
      <br><br>
      <b>Email id</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id" required>
      <!-- <br><br>
      <b>Password</b>
      <br>
      <input style="width: 400px; height: 30px;" type="password" name="pass" placeholder="password" required> -->
      <br><br>
      <!-- <label for="birthday"><b>Date of Birth</b></label>
      <br>
       <input style="width: 400px; height: 30px;" type="date" id="birthday" name="birthday" required>
      <br><br> -->
      
      <b>Practise</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="practise" placeholder="Practise" required>
      <br><br>
      
      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <br><br>
      <!-- <label for="Blood_group"><strong>Blood_Group:</strong> </label>
      <br><br>
      <select name="Blood_group" id="Blood_group">
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="B-">B-</option>
          <option value="AB+">A-</option>
          <option value="B-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option> 
      </select><br><br> -->
      <!-- <label for="Location"><strong>Location:</strong> </label>
      <br><br>
      <select name="Location" id="Location">
          <option value="Mumbai">Mumbai</option>
          <option value="Delhi">Delhi</option>
          <option value="Calcuta">Calcutta</option>
          
      </select><br><br> -->

      <input class="button" type="submit" name="submit" value="Save">
      <input class="button" type="button" value="Print" onclick="window.print()">
    </form>
    <script>
    function goback(){
        window.location="doctor_h.php";
    }
</script>
<input type="button" onclick="goback()" value="Go Back">
  </div>
  </div>
  </html>