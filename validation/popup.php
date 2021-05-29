<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

<style>
/*body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;

}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 15px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

</head>

<body>

<p id="p" ></p>

<label for="fname">Student Number:</label><br>
<input type="text" id="sn" placeholder="Enter Student Number" name="fname"><br>
<button class="open-button" id="bt" onclick="f()">Open Form</button>

<div class="form-popup" id="myForm">
  <form class="form-container">
    <h1>Acount Already Exist</h1>
    <p>delete account if you want to.</p>

    <button type="submit" id="dl" class="btn" onclick="d()">Overwrite</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
</div>

<script>

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
var time;
var id;
function f(){

                $(document).ready(function(){
                  id=$("#sn").val();
                  $.ajax({
                    url: "index.php",
                    method: "POST",
                    data: {id:id},
                    dataType: "HTML",
                    success: function(data){

                          if(JSON.parse(data).student_num === id){
                            let info=data;
                            let inf=JSON.parse(info);
                            let y=inf.student_day;
                            time=y;
                            let year=new Date().getFullYear().toString();

                            if(y.includes(year)){

                                    document.getElementById("myForm").style.display = "block";
                                  //$('#p').html(data);
                            }
                            else{
                                    document.getElementById("myForm").style.display = "none";
                            }
                          }
                          else if(JSON.parse(data).student_num !== id || id==="null"){
                                    document.getElementById("myForm").style.display = "none";
                          }


                    }

      })
      });

  }

  function d(){
    $(document).ready(function(){
      $.ajax({
        url: "delete_account.php",
        method: "POST",
        data: {id: id, date: time},
        dataType: "HTML",
        success: function(data){
                    alert(data);
                    document.getElementById("myForm").style.display = "none";

        }
      })
    });
  }

</script>

</body>
</html>
