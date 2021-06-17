<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Course</title>
  <link rel="stylesheet" href="styla.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

</head>
<body>

  <nav>
  <div class="topnav">
        Allocation System
  </div>
  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">View Application</a></li>
  </ul>
  <nav>

    <div class="ground">

      <h1>Create Course</h1>

      <div class="input">
        <label for="">Course Code</label>
        <input type="text" id="code" value="" placeholder="eg. Introduction To Programming" required>
      </div>

      <div class="input">
        <label for="">Course Name</label>
        <input type="text" id="name" value="" placeholder="eg. Introduction To Programming" required>
      </div>

      <div class="input">
        <label for="">Course Year</label>
        <input type="text" id="year" value="" placeholder="eg. 2021" required>
      </div>

      <div class="input">
        <label for="">Number Of Tutors Required</label>
        <input type="text" id="tutorReq" value="" placeholder="eg. 20" required>
      </div>

      <div class="input">
        <label for="">Semester</label>
        <input type="text" id="semester" value="" placeholder="eg. 1" required>
      </div>

      <div class="input">
        <label for="">Minimum Percentage Required</label>
        <input type="text" id="minMark" value="" placeholder="eg. 75" required>
      </div>

      <div class="input">
        <label for="">Due Date (YYYY-MM-DD)</label>
        <input type="text" id="dueDate" value="" placeholder="eg. 2021-03-02" required>
      </div>

      <div class="button">
        <input type="button" id="button1" onclick="create()" value="Create Course" required>
      </div>

    </div>

    <script>

function create(){

  $(document).ready(function(){

    var code=$("#code").val();
    var name=$("#name").val();
    var year=$("#year").val();
    var tutorReq=$("#tutorReq").val();
    var semester=$("#semester").val();
    var minMark=$("#minMark").val();
    var dueDate=$("#dueDate").val()

    $.ajax({

      url: "create.php",
      method: "POST",
      data: {year:year ,tutorReq:tutorReq ,dueDate:dueDate ,semester:semester ,minMark:minMark , name:name, code:code},
      dataType: "HTML",
      success: function(data){

      }
})
});

}

</script>

</body>
</html>
