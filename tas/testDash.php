<?php

//database connection options
$options = array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
//create connection to database
$handler = new PDO("mysql:host=localhost;dbname=emza", 'root', 'Tshamano93@', $options);
$sql = 'SELECT * FROM application INNER JOIN applicant ON application.applicant_studentNo=applicant.applicant_studentNo INNER JOIN course ON application.course_code=course.course_code';

//fetch all records in applicants table
$records = $handler->query($sql)->fetchAll();

//2D array to hold course=>students
$courses = [];
$count = [];

//programatically group applicants by course 
foreach ($records as $record) {
    $courses[$record['course_code']][] = array($record['applicant_firstName'], $record['applicant_studentNo'], $record['application_mark'], $record['applicant_ID']);
    if(isset($count[$record['applicant_ID']] )) {
        if(strtolower($record['application_status']) == 'accepted')
            $count[$record['applicant_ID']]++;
    } else {
        if(strtolower($record['application_status']) == 'accepted')
            $count[$record['applicant_ID']] = 1;
        else
            $count[$record['applicant_ID']] = 0;
    }
}
?>
<!DOCTYPE html>
<html>
    
     <style>

.dropdownPosts {
    position: absolute;
    display: inline-block;
}
.dropdownbtn {
    position: absolute;
    color: white;
    font-size: 6px;
    border: none;
    cursor: pointer;
    margin-top: 6%;
    margin-right: 30%;
}
.icons li {
    background: none repeat scroll 0 0 #000;
    height: 7px;
    width: 7px;
    line-height: 0;
    list-style: none outside none;
    margin-right: 15px;
    margin-top: 1px;
    vertical-align: top;
    border-radius:50%;
    pointer-events: auto;
    display: inline-block;
}
.showRight{
    color:#000 !important;
    padding: 10px;
}
.btn-right {
    right: 0.01em;
}
.dropdownPost-content {
    display: none;
    position: absolute;
    margin-top: 60px;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdownPost-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdownPosts a:hover {background-color: #f1f1f1}

.show {display:block;}

.btn-left {
    left: 0.4em;
}

.btn-left, .btn-right {
    position: absolute;
    top: 0.24em;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Drag n Drop</title>
    <script>
    //3-DOT MENU
    function showDropdown(){
        document.getElementById("myDropdown").classList.toggle("show");
    }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropdownbtn')) {
            var dropdowns = document.getElementsByClassName("dropdownPost-content");
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
    <link rel="stylesheet" href="main.css" />
</head>

<body>
    <div class="app">
        <header>
            <h1 style="color:#D4D4D4">TUTOR ALLOCATION SYSTEM</h1>
        </header>
        <div class="lists">
            <?php foreach ($courses as $course => $students) : ?>
                <div class="list">
                    <h3 style="color:#D4D4D4"><?php echo $course; ?></h3>
                     <!-- three dot menu -->
            <div class='dropdownPosts'>
                <!-- three dots -->
                <ul class='dropdownbtn icons btn-right showLeft' onclick="showDropdown()">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <!-- menu -->
                <div id='myDropdown' class="dropdownPost-content">
                    <a href='#EditCourse'>Edit course</a>
                    <a href='#GenerateEmail'>Generate email</a>
                    <a href='#OfferEmail'>Offer email</a>
                </div>
            </div>
                    <?php foreach ($students as $student) : ?>
                        <div id="<?php echo bin2hex(random_bytes(6)); ?>" class="list-item" draggable="true"><?php echo $student[0]; ?><br><?php echo $student[1]; ?><br><?php echo $student[2]; ?> (Mark)<br><?php echo $count[$student[3]];?> Accepted</div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="script.js"></script>
    
</body>

</html>