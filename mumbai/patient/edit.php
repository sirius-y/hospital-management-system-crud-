<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['fname']) && isset($_POST['lname'])) {
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

    $sql = "UPDATE patients SET fname = :fname,
    mname= :mname,lname= :lname, res_address= :address, cont_no= :cont_no,
    gender=:gender,
    email= :email, appt_desc= :apt_desc, past_med= :past_med,
    details= :details, blood_grp= :bld_grp, location= :loca
            WHERE patient_id = :patient_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':fname' => $_POST['fname'],
      ':mname' => $_POST['mname'],
      ':lname' => $_POST['lname'],
      ':address' => $_POST['address'],
      ':cont_no' => $_POST['phone'],
      ':gender' => $_POST['gender'],
      ':email' => $_POST['email'],
      ':apt_desc' => $_POST['description'],
      ':past_med' => $_POST['past'],
      ':details' => $_POST['details'],
      ':bld_grp' => $_POST['blood'],
      ':loca' => $_POST['location'],
    ':patient_id' => $_POST['user_id']));

    $_SESSION['success'] = 'Record updated';
    header( 'Location: patient_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['patient_id']) ) {
  $_SESSION['error'] = "Missing patient id";
  header('Location: patient_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM patients where patient_id = :xyz");
$stmt->execute(array(':xyz' => $_GET['patient_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value';
    header( 'Location: patient_h.php' ) ;
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
$e=htmlentities($row['blood_grp']);
$f=htmlentities($row['cont_no']);
$g=htmlentities($row['email']);
$h=htmlentities($row['res_address']);
$i=htmlentities($row['appt_desc']);
$j=htmlentities($row['past_med']);
$k=htmlentities($row['details']);
$l=htmlentities($row['location']);
$user_id = $row['patient_id'];
?>
<html>
<link rel="stylesheet" href="style.css">
<div class="main">
<h2>Edit Existing Patient Data</h2>
<form method="post">
<b>First Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="fname" placeholder="first name"value="<?= $a ?>" required>
      <br><br>
      <b>Middle Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="mname" placeholder="middle name"value="<?= $b ?>"" required>
      <br><br>
      <b>Last Name</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="lname" placeholder="lastname" value="<?= $c ?>"required>
      <br><br>
      <b>Residential Address</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="address" placeholder="full Address"value="<?= $h ?>" required>
      <br><br>
      <b>Contact_No</b>
      <br>
      <input style="width: 400px; height: 30px;" type="number" name="phone" min="0" placeholder="ph.number"value="<?= $f ?>" required>
      <br><br>
      <b>Email</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="email" placeholder="email id" value="<?= $g ?>"required>
      <br><br>
      <b>Appointment Description</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="description" placeholder="Appointment_Description"value="<?= $i ?>" required>
      <br><br>
      <b>Past Medical History</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="past" placeholder="Past_Medical_History"value="<?= $j ?>" required>
      <br><br>
      <b>Details</b>
      <br>
      <input style="width: 400px; height: 30px;" type="text" name="details" placeholder="lastname"value="<?= $k ?>" required>
      <br><br>
      <b>Gender</b>
      <br>
      <input type="radio" name="gender" value="female"checked="<?= $d ?>">Female
      <input type="radio" name="gender" value="male"checked="<?= $d ?>">Male
      <input type="radio" name="gender" value="other"checked="<?= $d ?>">Other
      <br><br>
      <label for="Blood_group"><strong>Blood_Group:</strong> </label>
      <br><br>
      <select name="blood" id="Blood_group">
          <option value="A+" <?php if($e='A+'){ echo ' selected="selected"'; } ?>>A+</option>
          <option value="B+"<?php if($e='B+'){ echo ' selected="selected"'; } ?>>B+</option>
          <option value="AB+"<?php if($e='AB+'){ echo ' selected="selected"'; } ?>>AB+</option>
          <option value="B-"<?php if($e='B-'){ echo ' selected="selected"'; } ?>>B-</option>
          <option value="A-"<?php if($e='A-'){ echo ' selected="selected"'; } ?>>A-</option>
          <option value="AB-"<?php if($e='AB-'){ echo ' selected="selected"'; } ?>>AB-</option>
          <option value="O+"<?php if($e='O+'){ echo ' selected="selected"'; } ?>>O+</option>
          <option value="O-"<?php if($e='O-'){ echo ' selected="selected"'; } ?>>O-</option>
      </select><br><br>
      <label for="Location"><strong>Location:</strong> </label>
      <br><br>
      <select name="location" id="Location">
          <option value="Mumbai"checked="<?= $l ?>">Mumbai</option>
          <option value="Delhi"checked="<?= $l ?>">Delhi</option>
          <option value="Kolkata"checked="<?= $l ?>">Kolkata</option>

      </select><br><br>
      <input type="hidden" name="user_id" value="<?= $user_id ?>">
<p><input class="button" type="submit" value="Update"/>
<a class="button"href="patient_h.php" style="text-decoration:none">Cancel</a></p>
</form>
</div>
</html>
