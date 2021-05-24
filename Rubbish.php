<?php
$servername = "127.0.0.1";
$username="s1431410";
$password="ICTPass2102";
$database="d1431410";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$applicant_ID = $_GET['applicant_ID'];
$sql = "SELECT applicant.applicant_firstName,applicant.applicant_lastName,
applicant.applicant_studentNo,applicant.applicant_transcript,
applicant.applicant_semOnePref,applicant.applicant_semTwoPref,
application.application_status,application.application_mark,course.course_name
FROM applicant INNER JOIN application ON applicant.applicant_ID = application.applicant_ID
AND applicant.applicant_ID = '$applicant_ID'
INNER JOIN course ON application.course_ID = course.course_ID;";

$result = mysqli_query($conn, $sql);
 echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);
 //   mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo  "Name: " . $row["applicant_firstName"].
          "Surname" . $row["applicant_lastName"].
          "Student Number" . $row["applicant_studentNo"].
          "Semester 1 Preference: " .$row["applicant_semOnePref"]
          "Semester 2 Preference: " .$row["applicant_semOnePref"]
          "Status: " .$row["application_status"]
          "Mark: " .$row["application_mark"]
          "Courses: " .$row["course_name"]
          "Attachment: " .$row["applicant_transcript"];
}
 else
      {
          echo json_encode(false);
      }

mysqli_close($conn);
?>
