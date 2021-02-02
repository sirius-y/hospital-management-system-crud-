<link rel="stylesheet" href="style.css">
<?php
session_start();
require_once "pdo.php";
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
    }
//code for cookies in future
$stmt = $pdo->query("SELECT * FROM doctors");
echo "<table border='1'>";
                echo " <thead><tr>";
                echo "<th>First Name</th>";
                echo " <th>Middle Name</th>";
                echo " <th>Last Name</th>";
                echo " <th>Gender</th>";
                echo " <th>Contact No.</th>";
                echo " <th>Domain</th>";
                echo " <th>Address</th>";
                echo " <th>Email</th>";
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
    echo(htmlentities($row['cont_no']));
    echo("</td><td>");
    echo(htmlentities($row['practise']));
    echo("</td><td>");
    echo(htmlentities($row['address']));
    echo("</td><td>");
    echo(htmlentities($row['email']));
    echo("</td><td>");
    echo('<a href="edit.php?doctor_id='.$row['doctor_id'].'">Edit</a> / ');
    echo('<a href="delete.php?doctor_id='.$row['doctor_id'].'">Delete</a>');
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
