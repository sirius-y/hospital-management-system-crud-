<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['fname']) && isset($_POST['lname'])) {


    $sql = "UPDATE doctors SET fname = :fname,
    mname=:mname,lname=:lname,gender=:gender,cont_no=:cont_no,
    practise=:practise,address=:address,email=:email
            WHERE doctor_id = :doctor_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
':fname' => $_POST['fname'],
':mname' => $_POST['mname'],
':lname' => $_POST['lname'],
':gender' => $_POST['gender'],
':cont_no' => $_POST['phone'],
':practise' => $_POST['practise'],
':address' => $_POST['address'],
':email' => $_POST['email'],
        ':doctor_id' => $_POST['user_id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: doctor_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['doctor_id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: doctor_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM doctors where doctor_id = :xyz");
$stmt->execute(array(':xyz' => $_GET['doctor_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value';
    header( 'Location: doctor_h.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$a = htmlentities($row['fname']);
$b = htmlentities($row['mname']);
$c = htmlentities($row['lname']);
$d=htmlentities($row['gender']);
$e=htmlentities($row['cont_no']);
$f=htmlentities($row['practise']);
$g=htmlentities($row['address']);
$h=htmlentities($row['email']);
$user_id = $row['doctor_id'];
?>
<html>
<link rel="stylesheet" href="style.css">
<div class="main">
<h2>Edit User</h2>
<form method="post">
<b>First Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="fname" placeholder="first name" value="<?= $a ?>"required>
      <br><br>
      <b>Middle Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="mname" placeholder="middle name" value="<?= $b ?>"required>
      <br><br>
      <b>Last Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="lname" placeholder="lastname" value="<?= $c ?>"required>
      <br><br>
      <b>Residential Address</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="address" placeholder="full Address"value="<?= $g ?>" required>
      <br><br>
      <b>Contact Number</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="ph.number"value="<?= $e ?>" required>
      <br><br>
      <b>Email id</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id"value="<?= $h ?>" required>
<br><br>

      <b>Practise</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="practise" placeholder="Practise"value="<?= $f ?>" required>
      <br><br>

      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female"checked="<?= $d ?>">Female
      <input type="radio" name="gender" value="male"checked="<?= $d ?>">Male
      <input type="radio" name="gender" value="other"checked="<?= $d ?>">Other
      <br><br>
<input type="hidden" name="user_id" value="<?= $user_id ?>">
<p><input class="button" type="submit" value="Update"/>
<a class="button"href="doctor_h.php">Cancel</a></p>
</form>
</div>
</html>
