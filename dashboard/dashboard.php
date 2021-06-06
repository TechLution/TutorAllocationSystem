<?php

//database connection options
$options = array(
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
//create connection to database
$handler = new PDO("mysql:host=localhost;dbname=tas", 'root', '', $options);
$sql = 'SELECT * FROM application INNER JOIN applicant ON application.applicant_ID=applicant.applicant_ID INNER JOIN course ON application.course_ID=course.course_ID';

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
            <h1 style="color:#D4D4D4">TUTOR ALLOCATION SYSTEM</h1>
        </header>
        <div class="lists">
            <?php foreach ($courses as $course => $students) : ?>
                <div class="list">
                    <h3 style="color:#D4D4D4"><?php echo $course; ?></h3>
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