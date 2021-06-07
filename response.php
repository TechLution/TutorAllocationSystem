<?php

$username="s1431410";
$password="ICTPass2102";
$database="d1431410";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE response SET response_received= 'YES' WHERE applicant_ID=1 ";
echo "You have accepted the offer.<br>";

if (mysqli_query($conn, $sql)) {
      echo "  And your record has updated successfully <br>";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

mysqli_close($conn);
?>
