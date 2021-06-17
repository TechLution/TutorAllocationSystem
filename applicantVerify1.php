<?php
$username="root";
$password="";
$database="boxinggymsystem";
$conn = mysqli_connect("localhost",$username ,$password,$database);
$output=array();
$studentNum = $_REQUEST["$studentNo"];
//$password =  $_REQUEST["pwd"];

if($conn){

if($result = mysqli_query($conn, "SELECT applicant_studentNo,applicant_date FROM applicant
   WHERE applicant_studentNo='$studentNum'")){
        while($row =$result->fetch_assoc()){
       $output[]=$row;
     }
   }
   else{
     die(mysqli_error($conn));
   }

     if(empty($output)){
       $array=array(array("applicant_studentNo"=>"false"));
     echo json_encode($array);
     }
     else{
       echo json_encode($output);
     }
 }
 else{
     die(mysqli_error($conn));
   }
?>
