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
</head>

<body>
    <div class="app">
        <header>
            <h1>TUTOR ALLOCATION SYSTEM</h1>
        </header>
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
