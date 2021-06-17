<?php

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


//Variables that need to be fetched from the create application
if(isset($_REQUEST['studentNo'])){
        $fName=$_POST['firstName'];
        $lName=$_POST['lastName'];
        $studentNumber=$_POST['studentNo'];

        //$courseSelected?
}

$mail->addAddress($studentNumber.'@students.wits.ac.za'); //this is who we sending the email to using their student number
$mail->addReplyTo('steven.james@wits.ac.za');

//$mail->isHTML(true);
$mail->Subject='CSAM Tutoring';
//$mail->Body='<h1 align=centre>Hi, You have entered the following details:</h1><br><p align=centre> First Name : $fName</p><br><p1 align=centre >Last Name : $lName</p1><br><p2 align=centre> Student Number : $studentNumber</p2>';
$mail->Body = 'Hi , first Name : $studentNumber';

if(!$mail->send()){
  echo"Message Not Sent!";
}else{
  echo"Message sent!";
}


?>