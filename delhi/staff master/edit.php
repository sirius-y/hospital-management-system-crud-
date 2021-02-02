<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['patient'])) {


    $sql = "UPDATE treatment SET patient_id = :fname,
    doctor_id=:mname,staff_id=:lname,progress=:gender,comment=:cont_no

            WHERE treat_id = :treat_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':fname' => $_POST['patient'],
':mname' => $_POST['doctor'],
':lname' => $_POST['staff'],
':gender' => $_POST['progress'],
':cont_no' => $_POST['comment'],
':treat_id' => $_POST['user_id'],));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: staff_dash.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['treat_id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: staff_dash.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM treatment where treat_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['treat_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value';
    header( 'Location: staff_dash.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$a = htmlentities($row['patient_id']);
$b = htmlentities($row['doctor_id']);
$c = htmlentities($row['staff_id']);
$d=htmlentities($row['progress']);
$e=htmlentities($row['comment']);
$user_id = $row['treat_id'];
?>
<html>
<link rel="stylesheet" href="style.css">
<div class="main">
<h2>Edit User</h2>
<form action="edit.php"method="post">
  <b>Patient ID</b>
  <br>
  <input style="width: 50px; height: 30px;" type="text" name="patient" placeholder="patient id" value="<?= $a ?>" required>
  <br><br>
  <b>Doctor ID</b>
  <br>
  <input style="width: 50px; height: 30px;" type="text" name="doctor" placeholder="doctor id"value="<?= $b ?>" required>
  <br><br>
  <b>Staff ID</b>
  <br>
  <input style="width: 50px; height: 30px;" type="text" name="staff" placeholder="lastname"value="<?= $c ?>" required>
  <br><br>
  <b>Progress</b>
  <br>
  <input style="width: 50px; height: 30px;" type="text" name="progress"  placeholder="ph.number"value="<?= $d ?>" required>
  <br><br>
  <b>Comment</b>
  <br>
  <input style="width: 200px; height: 150px;" type="text" name="comment" placeholder="email id"value="<?= $e ?>" required>
<input type="hidden" name="user_id" value="<?= $user_id ?>"><br><br>
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
