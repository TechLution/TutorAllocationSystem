<?php

$username="s1431410";
$password="ICTPass2102";
$database="d1431410";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//call auto

require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug=2;
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='techlutiongroup26@gmail.com';
$mail->Password='techlution@26';
$mail->setFrom('techlutiongroup26@gmail.com','Techlution'); //Email from us

//$sql = "select applicant_studentNo from applicant where applicant_ID=29";
//$result = $conn->query($sql);
//$resultRow = $result->fetch_assoc();
//$res = $resultRow['applicant_studentNo'];

//$mail->addAddress($res.'@students.wits.ac.za'); //this is who we sending the email to using their student number,fetch this from database.
$mail->addAddress('1439706@students.wits.ac.za');
$mail->addReplyTo('steven.james@wits.ac.za');

//$mail->isHTML(true);
$mail->Subject='CSAM Tutoring';
$mail->Body='Hi, Congratulations your application has been approved to tutor Introduction to Algorithms and Programming
            Please click on the following link to accept your offer:
            link : https:lamp.ms.wits.ac.za/home/s1431410/response.php

            Click on the following link to reject your offer :
            link: https:lamp.ms.wits.ac.za/home/s1431410/responseRe.php';

if(!$mail->send()){
  echo"Message Not Sent!";
}else{
  echo"Message sent!";
}

mysqli_close($conn);

?>
