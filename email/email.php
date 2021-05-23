<?php
/*  This is for taking info from the form
if(isset($_POST['submit'])){
		$fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
		$student_number=$_POST['studentNo'];

    Steven
    James
    12345
    BCO-80
    DataBase - 85
}
*/

$to =  'benefactormokoena@gmail.com';//'1875489@students.wits.ac.za';  email to send to.
$subject = 'Tutoring Form Application';
$message = "Hi, you have entered the following details in the application form:\n
            Name              : Steven \n
            Surname           : James \n
            StudentNo         : 12345 \n
            Courses selected  : Basic Computer Organization - 80 \n
                                    DataBase Fundamentals - 85 ";

$headers = "from: StevenJames@gmail.com \r\n DO NOT Reply!";
$mail_sent = mail( $to, $subject, $message, $headers );

  if($mail_sent==true){
      echo "Mail Sent";
  }else{
    echo "Mail failed";
  }

?>
