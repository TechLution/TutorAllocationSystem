<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create a course.</p>
      <hr>

      <label for="y"><b>Year</b></label>
      <input type="text" placeholder="Year" id="y" required>

      <label for="r"><b>Registration Number</b></label>
      <input type="text" placeholder="Enter Registration" id="r" required>

      <label for="d"><b>Due Date</b></label>
      <input type="text" placeholder="Due Date" id="d" required>

      <label for="s"><b>Semester</b></label>
      <input type="text" placeholder="Semester" id="s" required>

      <label for="m"><b>Minimum Mark</b></label>
      <input type="text" placeholder="Minimum Mark" id="m" required>
      <hr>

      <button type="submit" onclick="n()" >Create Course</button>
    </div>

<script>

function n(){

  $(document).ready(function(){
    var year=$("#y").val(); // This is used to fetch the inputed data from the fields, the val() is for that and y is the id
    var number=$("#r").val();// This is used to fetch the inputed data from the fields, the val() is for that and r is the id
    var date=$("#d").val();// This is used to fetch the inputed data from the fields, the val() is for that and d is the id
    var semester=$("#s").val();// This is used to fetch the inputed data from the fields, the val() is for that and s is the id
    var mark=$("#m").val();// This is used to fetch the inputed data from the fields, the val() is for that and m is the id

    $.ajax({

      url: "button2.php", // take the data to the index.php file where it will be added to the table
      method: "POST",
      data: {y:year ,n:number ,d:date ,s:semester ,m:mark}, // In the index.php file y,n,d,s and m will be used
      dataType: "HTML",
      success: function(data){

      }
})
});

}

</script>
</body>
</html>
