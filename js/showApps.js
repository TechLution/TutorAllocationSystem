
window.addEventListener("load", function(){
    var urlRequest = new XMLHttpRequest();
    // find a way of getting the job id
    //var user = document.getElementById("JOB_ID").value;
    
    var job_id = localStorage.getItem("Jid");
    //alert(job_id);
    var jobidInt = parseInt(job_id);

    urlRequest.open('GET',"http://lamp.ms.wits.ac.za/~s1879990/ViewApp.php/?job_id="+jobidInt);
    urlRequest.onload = function(){
        var respond = JSON.parse(urlRequest.responseText);
        HtmlOutput(respond);
    };
    urlRequest.send();
});

var display = document.getElementById("displayApps");
var jtitle = document.getElementById("job_title");

function HtmlOutput(data) {

  var jbname = localStorage.getItem("jTitle");
  var htmlstr = "<h5>" + jbname + "</h5>"
  jtitle.insertAdjacentHTML('beforeend', htmlstr);

  var htmlString="";
  var hold="a";
  hold=data[0].STUDENT_NO;
  if(!hold.localeCompare("false")){
    htmlString= '<tr><td class="col1"> No Applications available</td></tr>';
  }
  else{
    for(i = 0; i < data.length; i++){
    htmlString += '<tr><td class="col1" onclick="parseSid()"><a href="StudentCV.html">'+data[i].STUDENT_NO+
    '</a></td><td class="col2">'+data[i].STUDENT_FNAME+
    '</td><td class="col3">'+data[i].STUDENT_LNAME+
    '</td><td class="col4-1">'+data[i].STUDENT_FACULTY+
    '</td><td class="col5">'+data[i].STUDENT_YOS+
    '</td></tr>';
    }
      //htmlString1 = window.location.assign("index.html");
    display.insertAdjacentHTML('beforeend',htmlString);

  }
}
