<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['fname'])) {
    // Data validation
    // if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
    //     $_SESSION['error'] = 'Missing data';
    //     header("Location: edit.php?user_id=".$_POST['user_id']);
    //     return;
    // }

    // if ( strpos($_POST['email'],'@') === false ) {
    //     $_SESSION['error'] = 'Bad data';
    //     header("Location: edit.php?user_id=".$_POST['user_id']);
    //     return;
    // }

    $sql = "UPDATE staff SET fname = :fname,
    mname=:mname,lname=:lname,gender=:gender,cont_no=:cont_no,
    category=:category,address=:address,email=:email
            WHERE staff_id = :staff_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':fname' => $_POST['fname'],
      ':mname' => $_POST['mname'],
      ':lname' => $_POST['lname'],
      ':gender' => $_POST['gender'],
      ':cont_no' => $_POST['phone'],
      ':category' => $_POST['category'],
      ':address' => $_POST['address'],
      ':email' => $_POST['email'],
':staff_id' => $_POST['user_id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: staff_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['staff_id']) ) {
  $_SESSION['error'] = "Missing staff id";
  header('Location: staff_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM staff where staff_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['staff_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value';
    header( 'Location: staff_h.php' ) ;
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
$f=htmlentities($row['category']);
$g=htmlentities($row['address']);
$h=htmlentities($row['email']);
$user_id = $row['staff_id'];
?>
<html>
<link rel="stylesheet" href="style.css">
<div class="main">
<h2>Edit User</h2>
<form action="edit.php"method="post">
<b>First Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="fname" placeholder="first name"value="<?= $a?>" required>
      <br><br>
      <b>Middle Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="mname" placeholder="middle name"value="<?= $b?>" required>
      <br><br>
      <b>Last Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="lname" placeholder="lastname"value="<?= $c?>" required>
      <br><br>
      <b>Residential Address</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="address" placeholder="full Address"value="<?= $g?>" required>
      <br><br>
      <b>Contact Number</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="ph.number"value="<?= $e?>" required>
      <br><br>
      <b>Email id</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id"value="<?= $h?>" required>
      <!-- <br><br>
      <b>Password</b>
      <br>
      <input style="width: 400px; height: 30px;" type="password" name="pass" placeholder="password" required> -->
      <br><br>
      <!-- <label for="birthday"><b>Date of Birth</b></label>
      <br>
       <input style="width: 400px; height: 30px;" type="date" id="birthday" name="birthday" required>
      <br><br> -->

      <b>Work Domain</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="category" placeholder="category"value="<?= $f?>" required>
      <br><br>

      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female"checked="<?=$d?>">Female
      <input type="radio" name="gender" value="male"checked="<?=$d?>">Male
      <input type="radio" name="gender" value="other"checked="<?=$d?>">Other
      <br><br>
      <input type="hidden" name="user_id" value="<?= $user_id ?>">
<p><input class="button" type="submit" value="Update"/>
<a class="button"href="staff_h.php" style="text-decoration: none">Cancel</a></p>
</form>
</div>
</html>
