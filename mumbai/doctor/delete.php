<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['delete']) || isset($_POST['doctor_id']) ) {
    $sql = "DELETE FROM doctors WHERE doctor_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['doctor_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: doctor_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['doctor_id']) ) {
  $_SESSION['error'] = "Missing doctor_id";
  header('Location: doctor_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT fname, mname, lname, doctor_id FROM doctors where doctor_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['doctor_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value ';
    header( 'Location: doctor_h.php' ) ;
    return;
}
$store= htmlentities($row['fname']). " " .htmlentities($row['mname'])." ". htmlentities($row['lname']);
?>
<p>Confirm: Deleting <?= $store; ?></p>

<form action="delete.php" method="post">
<input type="hidden" name="doctor_id" value="<?= $row['doctor_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="doctor_h.php">Cancel</a>
</form>
