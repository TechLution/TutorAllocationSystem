<?php
$servername = "127.0.0.1";
$username="root";
$password="";
$database="d1431410";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$course1=$_GET["course_ID"];
$status=$_GET["status"];
$applicant_ID=$_GET['applicant_ID']; 


$sql2 = "Update application set application_status = '$status' where applicant_ID='$applicant_ID' and course_ID='$course1'";
if ($conn->query($sql2) == TRUE) {
echo 'success';
}
else {echo 'fail';}
$conn->close();

?>