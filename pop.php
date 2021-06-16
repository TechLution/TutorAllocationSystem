<?php

$servername = "127.0.0.1";
$username="root";
$password="";
$database="d1431410";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$applicant_ID = $_GET['applicant_ID'];
$sql = "SELECT applicant.applicant_firstName,applicant.applicant_lastName,
applicant.applicant_studentNo,applicant.applicant_transcript,
applicant.applicant_semOnePref,applicant.applicant_semTwoPref,
application.application_status,application.application_mark,course.course_name,
application.course_ID
FROM applicant INNER JOIN application ON applicant.applicant_ID = application.applicant_ID
AND applicant.applicant_ID = '$applicant_ID'
INNER JOIN course ON application.course_ID = course.course_ID;";

$result = mysqli_query($conn, $sql);
 //echo $conn->error;
 mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);
  
 //   mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo "<ul>Name : " . $row["applicant_firstName"]."</ul>";
    echo "<ul>Surname : " . $row["applicant_lastName"]."</ul>";
    echo "<ul>Student Number: " . $row["applicant_studentNo"]."</ul>";
    echo "<ul>Semester 1 Preference(s): " .$row["applicant_semOnePref"]."</ul>";
    echo "<ul>Semester 2 Preference(s): " .$row["applicant_semOnePref"]."</ul>";
    echo "<ul>Status : " . $row["application_status"]."</ul>";
    //echo "<ul>Course : " . $row["course_ID"]."</ul>";
    echo "<ul>Mark for this the Course :" . $row["application_mark"]."</ul>";
    //echo "<ul>Other Courses Applied For :" . $row[" "]."</ul>";
    echo "<ul>Attachment :" . $row["applicant_transcript"]."</ul>";

    echo "<label for=\"choose\">Update status:</label>";
    echo "<br>";
    echo "<select name=\"application_status\" id=\"sel\">";
    echo "<option value=\"Accepted\">Accepted</option>";
    echo "<option value=\"Rejected\">Rejected</option>";
    echo "</select>";
    echo "<button onclick= updateStatus(".$row["course_ID"].",".$applicant_ID.")>Submit</button>";
    //echo "<button  onclick=\"updateStatus()\">Submit</button>";
}
 else
      {
          echo json_encode(true);
      }

mysqli_close($conn);
?>

