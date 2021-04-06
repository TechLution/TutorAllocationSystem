//Job status : Once-Off
var btnSubmit = document.getElementById("BtnSubmit");
btnSubmit.addEventListener("click",function(){
  var urlSubmitData = new XMLHttpRequest();
  urlSubmitData.open('POST','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?');
  urlSubmitData.onload = function(){
      var responseT = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(responseT);
  };
  urlJobStatus.send();
});

var disJobDiv = document.getElementById("jobDiv");
// list jobs given data array
//function to be tested
function HtmlDisplayJob(data) {
  var htmlString="",hold="";
  hold=data[0].JOB_TITLE;
  if(!hold.localeCompare("false")){
    htmlString = "<h2>"+"No available jobs"+"<h2>";
  }
  else{
    for(i = 0; i < data.length; i++){
      htmlString += "<br><h2>"+data[i].JOB_TITLE+"</h2> <h3> Duration: "+data[i].JOB_STATUS+"</h3> <p> Description: "
      +data[i].JOB_DESC+"</p> <small> Deadline: "+data[i].JOB_DEADLINE+  "</small>";
    }
  }
  disJobDiv.insertAdjacentHTML('beforeend',htmlString);
}
