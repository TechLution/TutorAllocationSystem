<?php
$username="s1431410";
$password="ICTPass2102";
$database="d1431410";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);
if ($conn){

        if (isset($_POST["bco"])){
           //taking the data in the order of database insertion
           $applicantID = mysqli_real_escape_string($conn,$_POST['NULL']);
           $bco = mysqli_real_escape_string($conn, $_POST["bco"]);
           $transcript = mysqli_real_escape_string($conn, $_POST['NULL']);
          //$bcoMark = mysqli_real_escape_string($conn, $_POST["bcoMark"]);
          $numModulesSem1 = mysqli_real_escape_string($conn, $_POST["#modulesSem1"]);
          $numModulesSem2 = mysqli_real_escape_string($conn, $_POST["#modulesSem2"]);

                                                                                                                                                                                                                                                                                                     ///salt and hash
    /*  $salt_string=$pwd+$stdNo;
     $newpwd = hash('SHA1',$salt_string,FALSE);
*/
          $sql = "INSERT INTO application(applicant_ID,application_courseChoice,application_transcript,
            application_SemOnePref,application_SemTwoPref) VALUES (?,?,?,?,?)";

          $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)){
                die(mysqli_error($conn));
            }
            else{
                mysqli_stmt_bind_param($stmt, "sssii",$applicantID,$bco,$numModulesSem1,$numModulesSem2);

                  if ($stmt->execute()){
                        echo json_encode(true);
                  }else{
                        echo json_encode(false);
                  }
            }

        }
        else{
                echo"@params missing!";
        }
}
else{
echo json_encode("no_connection");
die();
}
?>
