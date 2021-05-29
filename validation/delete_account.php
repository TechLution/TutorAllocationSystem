<?php
$con = new mysqli("localhost","root","","inc") or die("Connect failed: %s\n". $con -> error);
$dbdata=array();

if(isset($_POST["date"]) && isset($_POST["id"])){

  if($con){

    $sql="DELETE FROM student WHERE student_num='".$_POST["id"]."' AND student_day='".$_POST["date"]."'";
    $que=mysqli_query($con,$sql);
    if($que){
      echo 'Deletion Successful';
    }
    else{
      echo 'Deletion Unsuccessful';
    }
}
}
?>
