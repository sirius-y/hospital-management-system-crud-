<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['delete']) || isset($_POST['staff_id']) ) {
    $sql = "DELETE FROM staff WHERE staff_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['staff_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: staff_h.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['staff_id']) ) {
  $_SESSION['error'] = "Missing staff id";
  header('Location: staff_h.php');
  return;
}

$stmt = $pdo->prepare("SELECT fname, mname, lname, staff_id FROM staff where staff_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['staff_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value ';
    header( 'Location: staff_h.php' ) ;
    return;
}
$store= htmlentities($row['fname']). " " .htmlentities($row['mname'])." ". htmlentities($row['lname']);
?>
<p>Confirm: Deleting <?= $store; ?></p>

<form action="delete.php" method="post">
<input type="hidden" name="staff_id" value="<?= $row['staff_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="staff_h.php">Cancel</a>
</form>
