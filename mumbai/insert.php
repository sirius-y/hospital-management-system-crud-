<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['fname']) || isset($_POST['email'])){
$sql = "INSERT INTO `patients`(`fname`, `mname`, `lname`, `res_address`, `cont_no`,
 `gender`, `email`, `appt_desc`, `past_med`, `details`, `blood_grp`, `location`)
VALUES (:fname,:mname,:lname,:address,:cont_no,:gender,:email,:apt_desc,:past_med,:details,:bld_grp,:loca)";
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
':loca' => $_POST['location']));
$_SESSION['success'] = 'Your request has been received. You will soon be contacted by out staff.';
header( 'Location: Registration.php' ) ;
return;
}

?>
