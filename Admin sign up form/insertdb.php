<?php
$email = $_POST['admin_email'];
$firstname = $_POST['admin_firstName'];
$lastname = $_POST['admin_lastName'];
$password = $_POST['admin_password'];
if (!empty($firstname) || !empty($password) || !empty($lastname) || !empty($email)) {
 $host = "https://lamp.ms.wits.ac.za/~s1431410/insertdb.php";
    $dbUsername = "s1431410";
    $dbPassword = "ICTPass2102";
    $dbname = "db1431410";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT admin_email From admin Where admin_email = ? Limit 1";
     $INSERT = "INSERT Into admin (admin_email, admin_firstName, admin_lastName, admin_password, ) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $email, $firstname, $lastname, $password);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already registered using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>