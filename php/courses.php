<?php

$username="s1431410";
$password="ICTPass2102";
$database="d1431410";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$sql = "SELECT
            course_name
        FROM
            course";
        //WHERE
           //course_date=YEAR(CURDATE())";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$data = array();

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)){
        array_push($data, $row);
    }
}

echo json_encode($data);
exit();

?>
