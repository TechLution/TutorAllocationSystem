<?php
$con = new mysqli("localhost","root","","inc") or die("Connect failed: %s\n". $con -> error);
$dbdata=array();

if(isset($_POST["id"])){

  if($con){

    $sql="SELECT * FROM student WHERE student_num='".$_POST["id"]."'";
    $que=mysqli_query($con,$sql);
    if (mysqli_num_rows($que) > 0) {
        while($row = mysqli_fetch_assoc($que)) {
              $dbdata[]= $row;
            }
        //  echo json.stringfy($dbdata);
            echo json_encode($dbdata[0]);
          }
    else
    {
      $dbdata['student_id']="null";
      $dbdata['student_num']="null";
      $dbdata['student_name']='none';
      $dbdata['student_day']='none';

      echo json_encode($dbdata);
    }
    }
}
?>
