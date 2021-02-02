<link rel="stylesheet" href="style.css">
<?php
session_start();
require_once "pdo.php";
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);}
//code for cookies in future
$stmt = $pdo->query("SELECT * FROM treatment");
echo "<table border='1'>";
                echo " <thead><tr>";
                echo "<th>Treatment ID</th>";
                echo "<th>Patient ID</th>";
                echo " <th>Doctor ID</th>";
                echo " <th>Staff ID</th>";
                echo " <th>Progress</th>";
                echo " <th>Comments</th>";
                echo " <th>Action</th>";
                echo " </tr></thead>";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['treat_id']));
    echo("</td><td>");
    echo(htmlentities($row['patient_id']));
    echo("</td><td>");
    echo(htmlentities($row['doctor_id']));
    echo("</td><td>");
    echo(htmlentities($row['staff_id']));
    echo("</td><td>");
    echo(htmlentities($row['progress']));
    echo("</td><td>");
    echo(htmlentities($row['comment']));
    echo("</td><td>");
    echo('<a href="edit.php?treat_id='.$row['treat_id'].'">Edit</a> / ');
    echo('<a href="delete.php?treat_id='.$row['treat_id'].'">Delete</a>');
    echo("</td></tr>\n");

}
?>
<html>
</table>
<script>
    function goback(){
        window.location="/adbms project/delhi/master.php";
    }
</script>
<a href="add.php">Add New Patient</a>
<br> <br>
<input type="button" onclick="goback()" value="Go Back">
</html>
