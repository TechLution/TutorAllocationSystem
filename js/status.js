let tag = document.getElementById('data');
 let stdn = document.getElementById('stdno');


let std = parseInt(sessionStorage.getItem('un'));
fetchData(std);

function fetchData(studentNo){
  let xhr = new XMLHttpRequest();
   xhr.open("POST", "https://lamp.ms.wits.ac.za/~s1879990/jobStatus.php?studentNo="+studentNo);

   xhr.onload = function (){
    // console.log(this.responseText);

      if (this.responseText == "No applications to display."){
        stdn.innerHTML = this.responseText;
      }else {
          stdn.innerHTML = studentNo;

          var jsonArr = JSON.parse(this.responseText);
          console.log(jsonArr);
          displayStatus(jsonArr);
      }
   };

  xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  xhr.send();
}



function displayStatus(arr) {

    //var today = new Date();
   for (var i = 0; i < arr.length; i++) {
        var htmlString = '';
        htmlString +=  '<tr><td class="col1">' + arr[i]["Department"] +
            '</td><td class="col2">' + arr[i]["Job_title"] +
            '</td><td class="col3">' + arr[i]["Job_term"] +
            '</td><td class="col4">' + new Date(arr[i]["Deadline"]) +
            '</td><td class="col5">' + 'submitted' +
            '</td></tr>';

            tag.insertAdjacentHTML('beforeend', htmlString);
  }
}
