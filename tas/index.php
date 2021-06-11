<?php

//database connection options
$options = array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
//create connection to database
$handler = new PDO("mysql:host=localhost;dbname=emza", 'root', 'Tshamano93@', $options);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <style>

.dropdownPosts {
    
    display: inline-block;
}

.title-section{
    display: block;
    flex-direction: row;
    align-items: center;
}

.dashboard-title{
    display: inline-block;
}

.list{
    position: relative;
}

.drop-down-menu-button{
    display: inline-block;
    cursor: pointer;
    float: right;
    width: 24px;
    height: 24px;
    cursor: pointer;
    background: no-repeat;
    background-image: url("ic_menu.svg");
}


.drop-down-menu-button:hover .dropdownPost-content{
    display: block;
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
    margin-top: 22px;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    right: 8px;
}
.dropdownPost-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdownPost-content a:hover {background-color: #f1f1f1}

.show {display:block;}

.btn-left {
    left: 0.4em;
}

.btn-left, .btn-right {
    position: absolute;
    top: 0.24em;
}
</style>


</head>

<body>
    <div class="app">
        <header>
            <h1>TUTOR ALLOCATION SYSTEM</h1>
        </header>
        <div class="lists">
            <?php foreach ($courses as $course => $students) : ?>
                <div class="list">

                    <div class="title-section">
                        <h3 class="dashboard-title"><?php echo $course; ?></h3>
                        <div class="drop-down-menu-button">
                            <!-- menu -->
                        <div class="dropdownPost-content">
                            <a href='#EditCourse'>Edit course</a>
                            <a href='#GenerateEmail'>Generate email</a>
                            <a href='#OfferEmail'>Offer email</a>
                        </div>
                        </div>

                        

                    </div>
                    
                    


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