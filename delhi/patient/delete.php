<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['delete']) || isset($_POST['patient_id']) ) {
    $sql = "DELETE FROM patients WHERE patient_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['patient_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: patient_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['patient_id']) ) {
  $_SESSION['error'] = "Missing patient id";
  header('Location: patient_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT fname, mname, lname, patient_id FROM patients where patient_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['patient_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value ';
    header( 'Location: patient_h.php' ) ;
    return;
}
$store= htmlentities($row['fname']). " " .htmlentities($row['mname'])." ". htmlentities($row['lname']);
?>
<p>Confirm: Deleting <?= $store; ?></p>

<form action="delete.php" method="post">
<input type="hidden" name="patient_id" value="<?= $row['patient_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="patient_h.php">Cancel</a>
</form>
