<?php
// php code to Update data from mysql database Table
//$hostname = "s1431410";
$username = "s1431410";
$password = "ICTPass2102";
$db = "d1431410";

//connect to db
$connect = mysqli_connect("127.0.0.1",$hostname, $username, $password, $db);

//form is posted
if (isset($_POST['update_course'])) {
  // get values form input text and number
  $id = $_POST['id'];
  $name = $_POST['name'];
  $code = $_POST['code'];
  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $tutorReq = $_POST['tutorReq'];
  $minMark = $_POST['minMark'];
  $dueDate = $_POST['dueDate'];

  // mysql query to Update data
  $query = "UPDATE course SET ";
  $query .= "course_year='$year',";
  $query .= "course_tutorReq='$tutorReq',";
  $query .= "course_dueDate='$dueDate',";
  $query .= "course_semester='$semester',";
  $query .= "course_minMark='$minMark',";
  $query .= "course_name='$name',";
  $query .= "course_code='$code'";
  $query .= "WHERE course_ID = $id";
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $updated = $result;
  mysqli_close($connect);
}
//edit page is loaded
else {
  //retrieve course id from query string
  $id = $_GET['id'] ?? null;

  //Gotcha: SQL injection
  $result = mysqli_query($connect, "select * from course where course_ID='$id'");
  if (!mysqli_num_rows($result)) {
    die("Course ID Not Specified or Not Found!");
  }
  //fetch row
  $row = mysqli_fetch_assoc($result);
  //retrieve values for display on form
  $name = $row['course_name'];
  $code = $row['course_code'];
  $year = $row['course_year'];
  $semester = $row['course_semester'];
  $tutorReq = $row['course_tutorReq'];
  $dueDate = $row['course_dueDate'];
  $minMark = $row['course_minMark'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Allocation System</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Stylesheet-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
  <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">



</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <!-- Navigation-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand page-scroll" href="index.html">Allocation System</a>
        <div class="phone"><span>STUDENT</span>Plug</div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html#InfoHub" class="page-scroll">View Application</a></li>
          <li><a href="index.html#services" class="page-scroll">Home</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
  </nav>
  <!-- Contact Section -->
  <div id="contact">
    <div class="container">
      <div class="page-scroll">
        <div class="col-md-8">
          <div class="row">
            <div class="section-title">
              <h2>Edit Course</h2>
              <?php if (isset($updated) && $updated) : ?>
                <p class="text-success">Course Updated</p>
              <?php endif; ?>
              <p>Please ensure you maintain the format of all attributes of the form below</p>
            </div>

            <form id="CreateForm" method="post" action="">
              <div class="col-md-12">
                <div class="form-group">

                  <div class="col-md-10">

                  </div>
                </div>
                <!-- Name -->
                <div class="col-md-8">
                  <ul>

                    <form>
                      <input name="id" type="hidden" class="form-control" placeholder="eg. 1" value="<?php echo $id ?? ""; ?>" required>
                      <li>
                        <p>Course Name</p>
                        <div class="form-group">
                          <input name="name" type="text" id="id_name" class="form-control" placeholder="eg. Introduction to Artificial Intelligence" value="<?php echo $name ?? ""; ?>" required>

                        </div>
                      </li>

                      <li>
                        <p> Course Code</p>
                        <div class="form-group">
                          <input readonly name="code" type="text" id="id_code" class="form-control" placeholder="eg. COMS1003" value="<?php echo $code ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>

                      <li>
                        <div class="form-group">
                          <p>Course year</p>
                          <input readonly name="year" type="text" id="id_year" class="form-control" placeholder="eg. 2010" value="<?php echo $year ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>

                      <li>
                        <div class="form-group">
                          <p>Number of Tutors Required</p>
                          <input name="tutorReq" type="text" id="id_tutorReq" class="form-control" placeholder="eg. 10" value="<?php echo $tutorReq ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>


                      <li>
                        <div class="form-group">
                          <p>Semester</p>
                          <input name="semester" type="text" id="Id_semester" class="form-control" placeholder="eg. 1" value="<?php echo $semester ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>

                      <li>
                        <div class="form-group">
                          <p>Minimum Percentage Required</p>
                          <input name="minMark" type="text" id="id_minMark" class="form-control" placeholder="eg. 75" value="<?php echo $minMark ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>

                      <li>
                        <div class="form-group">
                          <p>Due Date (DD/MM/YYYY)</p>
                          <input name="dueDate" type="text" id="id_dueDate" class="form-control" placeholder="eg. 03/02/2021" value="<?php echo $dueDate ?? ""; ?>" required="required">
                          <p class="help-block text-danger"></p>
                        </div>
                      </li>

                    </form>

                    <div class="col-md-6">
                      <br>
                      <button name="update_course" value="update" type="submit" class="btn btn-custom btn-lg">Update Course</button>
                    </div>

                  </ul>
                </div>
              </div>
            </form>
          </div>
          </form>

          <script src="//code.jquery.com/jquery.min.js"></script>
          <script src="js/bootstrap-msg.js"></script>


        </div>
      </div>
    </div>
  </div>

  <!-- Footer Section -->
  <div id="footer">
    <div class="container text-center">
      <p>&copy; 2020 WITSLINK. Design by ELtech <a href="http://www.templatewire.com" rel="nofollow">School Project</a></p>
    </div>
  </div>
  <script src="js/checkboxClick.js"></script>

  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/SmoothScroll.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.js"></script>
  <!--<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/contact_me.js"></script>
<script type="text/javascript" src="js/main.js"></script>-->
</body>

</html>
