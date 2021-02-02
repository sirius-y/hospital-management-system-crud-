<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['patient']) || isset($_POST['doctor'])){
$sql = "INSERT INTO treatment (patient_id,doctor_id,staff_id,progress,comment)
VALUES (:fname,:mname,:lname,:gender,:cont_no)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':fname' => $_POST['patient'],
':mname' => $_POST['doctor'],
':lname' => $_POST['staff'],
':gender' => $_POST['progress'],
':cont_no' => $_POST['comment']));
$_SESSION['success'] = 'Record Added';
header( 'Location: staff_dash.php' ) ;
return;
}

?>

<html>
<link rel="stylesheet" href="style.css">
<div class="main">
    <h2>Assign a new patient</h2>

    <form action="add.php" method="POST">
      <!-- <b>Patient_Id</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="uid" placeholder="eg. E123" required>
      <br><br> -->
      <b>Patient ID</b>
      <br>
      <input style="width: 50px; height: 30px;" type="text" name="patient" placeholder="patient id" required>
      <br><br>
      <b>Doctor ID</b>
      <br>
      <input style="width: 50px; height: 30px;" type="text" name="doctor" placeholder="doctor id" required>
      <br><br>
      <b>Staff ID</b>
      <br>
      <input style="width: 50px; height: 30px;" type="text" name="staff" placeholder="lastname" required>
      <br><br>
      <b>Progress</b>
      <br>
      <input style="width: 50px; height: 30px;" type="text" name="progress"  placeholder="comment" required>
      <br><br>
      <b>Comment</b>
      <br>
      <input style="width: 200px; height: 150px;" type="text" name="comment" placeholder="email id" required>
<br><br>
      <input class="button" type="submit" name="submit" value="Save">
      <input class="button" type="button" value="Print" onclick="window.print()">
    </form>
    <script>
    function goback(){
        window.location="staff_dash.php";
    }
</script>
<input type="button" onclick="goback()" value="Go Back">
  </div>
  </div>
  </html>
