<?php
$username="s1431410";
$password="ICTPass2102";
$database="d1431410";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);
if ($conn){

        if (isset($_REQUEST["studentNo"])){
           //data for applicant table
          $studentNo = mysqli_real_escape_string($conn,$_REQUEST["studentNo"]);
          $fname = mysqli_real_escape_string($conn, $_REQUEST["firstName"]);
          $lname = mysqli_real_escape_string($conn, $_REQUEST["lastName"]);
          $numModulesSem1 = mysqli_real_escape_string($conn, $_REQUEST["numModulesSem1"]);
          $numModulesSem2 = mysqli_real_escape_string($conn, $_REQUEST["numModulesSem2"]);
         // $transcript = mysqli_real_escape_string($conn, $_REQUEST["transcript"]);
          $applicantDate= date_create()->format('Y-m-d H:i:s');
            //$applicantDate = date('Y-m-d');

          //data for application table
          $bcoCourseCode = mysqli_real_escape_string($conn,$_POST["bco"]);
          $iapCourseCode = mysqli_real_escape_string($conn,$_POST["iap"]);
          $iapCourseCode = mysqli_real_escape_string($conn,$_POST["dcs"]);
          //$iapCourseCode = mysqli_real_escape_string($conn,$_REQUEST["iap"]);
          $courseYear = date_create()->format('Y-m-d H:i:s');
          $applicationStatus = "Submitted";
          $applicationMark = mysqli_real_escape_string($conn,$_REQUEST["bcoMark"]);

          $sql = "INSERT INTO applicant(applicant_firstName,applicant_lastName,applicant_studentNo,
                  applicant_semOnePref,applicant_semTwoPref,applicant_date)
                  VALUES (?,?,?,?,?,'$applicantDate')";
         // $bcoCourseYear = "SELECT course_year FROM course where course_code = '$bcoCourseCode'";
        //$iapCourseYear = "SELECT course_year FROM course where course_code = $iapCourseCode";

         //$sql2 = "INSERT INTO application(course_code,applicant_studentNo,application_mark,course_year,application_status,
                 //applicant_date) VALUES(?,?,?,'$courseYear','$applicationStatus','$applicantDate')";

         $stmt = mysqli_stmt_init($conn);
         $stmt2=mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt,$sql)){
              die(mysqli_error($conn));
        }
        else{
            mysqli_stmt_bind_param($stmt, "sssii",$fname,$lname,$studentNo,
                                   $numModulesSem1,$numModulesSem2);

              if ($stmt->execute()){

                    $selectApplicantDate = "SELECT applicant_date from applicant where applicant_studentNo = '$studentNo'";



                    $appDateResult = $conn->query($selectApplicantDate);
                    $dateRow = $appDateResult->fetch_assoc();
                    $Date = $dateRow['applicant_date'];

                    $bcoCourseYear = "SELECT course_year FROM course where course_code = '$bcoCourseCode'";

                    if(isset($_POST["bco"])){
                      $bcoResult = $conn->query($bcoCourseYear);
                       $bcoRow = $bcoResult->fetch_assoc();
                       $bcoDate= $bcoRow['course_year'];
                       echo "$bcoDate";
                       $sql2 = "INSERT INTO application(course_code,applicant_studentNo,application_mark,course_year,application_status,
                       applicant_date) VALUES(?,?,?,'$bcoDate','$applicationStatus','$Date')";

                          if(!mysqli_stmt_prepare($stmt2,$sql2)){
                                die(mysqli_error($conn));
                          }

                          else{
                               mysqli_stmt_bind_param($stmt2,"ssi",$bcoCourseCode,$studentNo,$applicationMark);

                               if($stmt2->execute()){
                                       echo "sql 2 successful";

                               }
                                       else{
                                            die(mysqli_error($conn));
                                            echo "sql2 unsuccessful";
                         }
                }
         }
         if(isset($_POST["mc"])){
           $mcCourseYear = "SELECT course_year FROM course where course_code = '$mcCourseCode'";

           $mcResult = $conn->query($mcCourseYear);
            $mcRow = $mcResult->fetch_assoc();
            $mcDate= $mcRow['course_year'];
            //echo "$bcoDate";
            $mcSql = "INSERT INTO application(course_code,applicant_studentNo,application_mark,course_year,application_status,
            applicant_date) VALUES(?,?,?,'$mcDate','$applicationStatus','$Date')";

               if(!mysqli_stmt_prepare($stmt2,$mcSql)){
                     die(mysqli_error($conn));
               }

               else{
                    mysqli_stmt_bind_param($stmt2,"ssi",$mcCourseCode,$studentNo,$mcMark);

                    if($stmt2->execute()){
                            echo " mc successful";

                    }
                            else{
                                 die(mysqli_error($conn));
                                 echo "mc unsuccessful";
              }
     }
}
if(isset($_POST["idsa"])){
  $dcsCourseYear = "SELECT course_year FROM course where course_code = '$idsaCourseCode'";

  $idsaResult = $conn->query($idsaCourseYear);
   $idsaRow = $idsaResult->fetch_assoc();
   $idsaDate= $idsaRow['course_year'];
   //echo "$bcoDate";
   $idsaSql = "INSERT INTO application(course_code,applicant_studentNo,application_mark,course_year,application_status,
   applicant_date) VALUES(?,?,?,'$idsaDate','$applicationStatus','$Date')";

      if(!mysqli_stmt_prepare($stmt2,$idsaSql)){
            die(mysqli_error($conn));
      }

      else{
           mysqli_stmt_bind_param($stmt2,"ssi",$idsaCourseCode,$studentNo,$idsaMark);

           if($stmt2->execute()){
                   echo " dcs idsa successful";

           }
                   else{
                        die(mysqli_error($conn));
                        echo "dcs idsa unsuccessful";
     }
}
}
   }

         else{
                 mysqli_error($conn);
                 echo "false1";
             }
}

}
else{
 mysqli_error($conn);
 echo "param missing";
}
}
else{
mysqli_error($conn);
echo json_encode("no_connection");
}
?>
