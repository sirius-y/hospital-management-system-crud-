<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['fname']) || isset($_POST['email'])){
$sql = "INSERT INTO patients(fname, mname, lname, res_address, cont_no,
 gender, email, appt_desc, past_med, details, blood_grp, location)
VALUES (:fname,:mname,:lname,:address,:cont_no,:gender,:email,:apt_desc,:past_med,:details,:bld_grp,:loca)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':fname' => $_POST['fname'],
':mname' => $_POST['mname'],
':lname' => $_POST['lname'],
':gender' => $_POST['gender'],
':cont_no' => $_POST['phone'],
':apt_desc' => $_POST['description'],
':address' => $_POST['address'],
':details' => $_POST['details'],
':past_med' => $_POST['past'],
':bld_grp' => $_POST['blood'],
':loca' => $_POST['location'],
':email' => $_POST['email']));
$_SESSION['success'] = 'Record Added';
header( 'Location: patient_h.php' ) ;
return;
}

?>

<html>
<link rel="stylesheet" href="style.css">
<div class="main">
    <h2>Patient's New Entry</h2>

    <form action="add.php" method="POST">

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
      <b>Contact No</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="ph.number" required>
      <br><br>
      <b>Email</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id" required>
      <br><br>
      <b>Appointment Description</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="description" placeholder="Appointment_Description" required>
      <br><br>
      <b>Past Medical History</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="past" placeholder="Past_Medical_History" required>
      <br><br>
      <b>Details</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="details" placeholder="lastname" required>
      <br><br>
      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <br><br>
      <label for="blood"><strong>Blood_Group:</strong> </label>
      <br><br>
      <select name="blood" id="Blood_group">
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="B-">B-</option>
          <option value="A-">A-</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
      </select><br><br>
      <label for="Location"><strong>Location:</strong> </label>
      <br><br>
      <select name="location" id="Location">
          <option value="Mumbai">Mumbai</option>
          <option value="Delhi">Delhi</option>
          <option value="Kolkata">Kolkata</option>

      </select><br><br>

      <input class="button" type="submit" name="submit" value="Save">
      <input class="button" type="button" value="Print" onclick="window.print()">
    </form>
    <script>
    function goback(){
        window.location="patient_h.php";
    }
</script>
<input type="button" onclick="goback()" value="Go Back">
  </div>


  </html>
