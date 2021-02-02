<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['delete']) || isset($_POST['treat_id']) ) {
    $sql = "DELETE FROM treatment WHERE treat_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['treat_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: staff_dash.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['treat_id']) ) {
  $_SESSION['error'] = "Missing treat_id";
  header('Location: staff_dash.php');
  return;
}

$stmt = $pdo->prepare("SELECT patient_id,doctor_id,staff_id FROM treatment where treat_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['treat_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value ';
    header( 'Location: staff_dash.php' ) ;
    return;
}
$store= htmlentities($row['treat_id']);
?>
<p>Confirm: Deleting entry with treatment id <?= $store; ?></p>
<p> Please note: Action is Irreversible!</p>

<form action="delete.php" method="post">
<input type="hidden" name="treat_id" value="<?= $row['treat_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="staff_dash.php">Cancel</a>
</form>
