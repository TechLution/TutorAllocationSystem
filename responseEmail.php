<?php

$to =   'benefactormokoena@gmail.com'; // email to send to.
$subject = 'Tutoring';

$message = " Hi, \n
            Congratulations your application has been approved to tutor COMS1018. \n
            Please click on the following link to accept your offer : \n
            link : https://lamp.ms.wits.ac.za/home/s1431410/response.php

            Click on the following link to reject your offer : \n
            link: https://lamp.ms.wits.ac.za/home/s1431410/responseRe.php   \n";

$headers = "from: StevenJames@gmail.com \r\n DO NOT Reply!";
$mail_sent = mail( $to, $subject, $message, $headers );

if($mail_sent==true){
      echo "Mail Sent";
  }else{
    echo "Mail failed";
}

?>
