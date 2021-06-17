<?php

$hostname = "127.0.0.1";
$username = "s1431410";
$password = "ICTPass2102";
$db = "d1431410";

$con = new mysqli($hostname, $username, $password, $db) or die("Connect failed: %s\n". $con -> error);

$name = $_POST['name'];
$code = $_POST['code'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$tutorReq = $_POST['tutorReq'];
$minMark = $_POST['minMark'];
$dueDate = $_POST['dueDate'];

if($con){

$query = "INSERT INTO course (course_year, course_tutorReq, course_dueDate, course_semester, course_minMark, course_name, course_code) VALUES ('$year', '$tutorReq','$dueDate' ,'$semester','$minMark','$name','$code')";
$que=mysqli_query($con,$query);

    if($que){
      echo 'Successful';
    }
    else{
      echo 'Unsuccessful';
    }

    $con->close();
}

?>
