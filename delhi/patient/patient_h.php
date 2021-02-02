<link rel="stylesheet" href="style.css">
<?php
session_start();
require_once "pdo.php";
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);}
//code for cookies in future
$stmt = $pdo->query("SELECT * FROM patients");
echo "<table border='1'>";
                echo " <thead><tr>";
                echo "<th>First Name</th>";
                echo " <th>Middle Name</th>";
                echo " <th>Last Name</th>";
                echo " <th>Gender</th>";
                echo " <th>Blood Group</th>";
                echo " <th>Contact No.</th>";
                echo " <th>Email</th>";
                echo " <th>Address</th>";
                echo " <th>Appointment Description</th>";
                echo " <th>Details</th>";
                echo " <th>Past Medical History</th>";
                echo " <th>Location</th>";
                echo " <th>Action</th>";
                echo " </tr></thead>";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['fname']));
    echo("</td><td>");
    echo(htmlentities($row['mname']));
    echo("</td><td>");
    echo(htmlentities($row['lname']));
    echo("</td><td>");
    echo(htmlentities($row['gender']));
    echo("</td><td>");
    echo(htmlentities($row['blood_grp']));
    echo("</td><td>");
    echo(htmlentities($row['cont_no']));
    echo("</td><td>");
    echo(htmlentities($row['email']));
    echo("</td><td>");
    echo(htmlentities($row['res_address']));
    echo("</td><td>");
    echo(htmlentities($row['appt_desc']));
    echo("</td><td>");
    echo(htmlentities($row['details']));
    echo("</td><td>");
    echo(htmlentities($row['past_med']));
    echo("</td><td>");
    echo(htmlentities($row['location']));
    echo("</td><td>");
    echo('<a href="edit.php?patient_id='.$row['patient_id'].'">Edit</a> / ');
    echo('<a href="delete.php?patient_id='.$row['patient_id'].'">Delete</a>');
    echo("</td></tr>\n");

}
?>
<html>
</table>
<script>
    function goback(){
        window.location="/adbms project/delhi/dash.php";
    }
</script>
<a href="add.php">Add New</a>
<br> <br>
<input type="button" onclick="goback()" value="Go Back">
</html>
