<?php
$con = new mysqli("127.0.0.1","s1431410","ICTPass2102","d1431410") or die("Connect failed: %s\n". $con -> error);// The database name,password and username must be changed
$dbdata=array();

$y = $_POST['y']; //this is the y from the line "data: {y:year ,n:number ,d:date ,s:semester ,m:mark}," line of the ajax function
$n = $_POST['n'];//this is the n from the line "data: {y:year ,n:number ,d:date ,s:semester ,m:mark}," line of the ajax function
$d = $_POST['d'];//this is the d from the line "data: {y:year ,n:number ,d:date ,s:semester ,m:mark}," line of the ajax function
$s = $_POST['s'];//this is the s from the line "data: {y:year ,n:number ,d:date ,s:semester ,m:mark}," line of the ajax function
$m = $_POST['m'];//this is the m from the line "data: {y:year ,n:number ,d:date ,s:semester ,m:mark}," line of the ajax function

if(isset($_POST["y"]) && isset($_POST["n"]) && isset($_POST["d"]) && isset($_POST["s"]) && isset($_POST["m"]) ){

  if($con){

    $query = "INSERT INTO course (course_year,registration_number,course_dueDate,course_semester,course_minMark) VALUES ('$y', '$n', '$d','$s','$m')"; //Here the table name and rows must be changed
    $que=mysqli_query($con,$query);
    if($que){
      echo 'Successful';
    }
    else{
      echo 'Unsuccessful';
    }
}
}
?>
