<?php

//database connection options
//$options = array(
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//);
//create connection to database
//$handler = new PDO("mysql:host=127.0.0.1;dbname=d1431410", 's1431410', 'ICTPass2102', $options);




$to =   'benefactormokoena@gmail.com'; // email to send to.
$subject = 'Tutors Approved';

$message = " Hi Students, \n
            Congratulations your applications have been approved to tutor the courses you applied for. \n
            Please click on the following link to accept your offer : \n
            link : file:///C:/xampp/htdocs/email/accept.html

            Click on the following link to reject your offer : \n
            link: file:///C:/xampp/htdocs/email/reject.html   \n";

$headers = "from: StevenJames@gmail.com \r\n DO NOT Reply!";
$mail_sent = mail( $to, $subject, $message, $headers );

  if($mail_sent==true){
      echo "Mail Sent";
  }else{
    echo "Mail failed";
  }


/*sending email to many recipients
$email_to = "jhewitt@amleo.com,some@other.com,yet@another.net,keepgoing@gmail.com";

OR WE CAN USE:

<?php
include("db.php");

$result = mysql_query("SELECT * FROM email");

while($row = mysql_fetch_array($result))
{
    $to = $row['address'];
}
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "example@example.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
?>
// correct way
while($row = mysql_fetch_array($result))
{
    $addresses[] = $row['address'];
}
$to = implode(", ", $addresses);
*/


?>
