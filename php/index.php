<?php

//database connection options
$options = array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
//create connection to database
$handler = new PDO("mysql:host=127.0.0.1;dbname=d1431410", 's1431410', 'ICTPass2102', $options);

//SQL to execute
$sql = <<<MLS
SELECT 
    application.course_code AS ccode,
    applicant.applicant_firstName AS sname
FROM 
    application
INNER JOIN
     applicant ON application.applicant_studentNo=applicant.applicant_studentNo
MLS;

//fetch all records in applicants table
$records = $handler->query($sql)->fetchAll();

//2D array to hold course=>students
$courses = [];

//programatically group applicants by course 
foreach ($records as $record) {
    $courses[$record['ccode']][] = $record['sname'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Drag n Drop</title>
    <link rel="stylesheet" href="main.css" />
    
    //Drop-down menu scripts and stylies
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            <style>
                *{margin: 0;padding:0px}

                .header{
                    width: 100%;
                    background-color: #0d77b6 !important;
                    height: 60px;
                }

                .showLeft{
                    background-color: #0d77b6 !important;
                    border:1px solid #0d77b6 !important;
                    text-shadow: none !important;
                    color:#fff !important;
                    padding:10px;
                }

                .icons li {
                    background: none repeat scroll 0 0 #fff;
                    height: 7px;
                    width: 7px;
                    line-height: 0;
                    list-style: none outside none;
                    margin-right: 15px;
                    margin-top: 3px;
                    vertical-align: top;
                    border-radius:50%;
                    pointer-events: none;
                }

                .btn-left {
                    left: 0.4em;
                }

                .btn-right {
                    right: 0.4em;
                }

                .btn-left, .btn-right {
                    position: absolute;
                    top: 0.24em;
                }

                .dropbtn {
                    background-color: #4CAF50;
                    position: fixed;
                    color: white;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                .dropbtn:hover, .dropbtn:focus {
                    background-color: #3e8e41;
                }

                .dropdown {
                    position: absolute;
                    display: inline-block;
                    right: 0.4em;
                }

                .dropdown-content {
                    display: none;
                    position: relative;
                    margin-top: 60px;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    overflow: auto;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown a:hover {background-color: #f1f1f1}

                .show {display:block;}

            </style>
            <script>
                function changeLanguage(language) {
                    var element = document.getElementById("url");
                    element.value = language;
                    element.innerHTML = language;
                }

                function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
</head>

<body>
    <div class="app">
        <header>
            <h1>TUTOR ALLOCATION SYSTEM</h1>
        </header>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
              //Drop-down menu
              
                <div class="header">

                <!-- three dot menu -->
                <div class="dropdown">
                    <!-- three dots -->
                    <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown()">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- menu -->
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#edit">Edit Course</a>
                        <a href="#sendofferemail">Send offer email</a>
                        <a href="#generateemail">Send email</a>

                    </div>
                </div>

            </div>
      <ul id="Nav" class="nav navbar-nav navbar-right">
       <li id="hrlgn"><a href="CreateCourse.html" class="page-scroll">Create Course</a></li>



      </ul>
    </div>
        
        <div class="lists">
            <?php foreach ($courses as $course => $students) : ?>
                <div class="list">
                    <h3><?php echo $course; ?></h3>
                    <?php foreach ($students as $student) : ?>
                        <div id="<?php echo bin2hex(random_bytes(6)); ?>" class="list-item" draggable="true"><?php echo $student; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
