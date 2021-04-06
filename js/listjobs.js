//on load list all jobs avaible
var avaibleJobs = new XMLHttpRequest();
avaibleJobs.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php');
avaibleJobs.onload = function(){
    var JobStatusData = JSON.parse(avaibleJobs.responseText);
    HtmlDisplayJob(JobStatusData);
};
avaibleJobs.send();

//when clicking the csam option
var csamopt = document.getElementById("csamOPT");
csamopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php?DEPT_ID=10003');
  urlJobStatus.onload = function(){
    var JobStatusData = JSON.parse(urlJobStatus.responseText);
    HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//when clicking the MSL option
var mslopt = document.getElementById("mslOPT");
mslopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?DEPT_ID=10001');
  urlJobStatus.onload = function(){
    var JobStatusData = JSON.parse(urlJobStatus.responseText);
    HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//Library work
var libraryopt = document.getElementById("libraryOPT");
libraryopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?DEPT_ID=10002');
  urlJobStatus.onload = function(){
    var JobStatusData = JSON.parse(urlJobStatus.responseText);
    HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//tutoring option
var tutoringopt = document.getElementById("tutoringOPT");
tutoringopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_TITLE=Tutoring');
  urlJobStatus.onload = function(){
    var JobStatusData = JSON.parse(urlJobStatus.responseText);
    HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//Cleaning
var cleaningopt = document.getElementById("cleaingOPT");
cleaningopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_TITLE=Cleaning');
  urlJobStatus.onload = function(){
    var JobStatusData = JSON.parse(urlJobStatus.responseText);
    HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//Facilitator option
var facilitatoropt = document.getElementById("facilitatorOPT");
facilitatoropt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_TITLE=Facilitator');
  urlJobStatus.onload = function(){
      var JobStatusData = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//job status : Part-_Time
var partTimeopt = document.getElementById("partTimeOPT");
partTimeopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_STATUS=Part-Time');
  urlJobStatus.onload = function(){
      var JobStatusData = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//job status: Full_Time
var fullTimeopt = document.getElementById("fullTimeOPT");
fullTimeopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_STATUS=Full-Time');
  urlJobStatus.onload = function(){
      var JobStatusData = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//JOB Status: Vacational
var vacationalopt = document.getElementById("vacationalOPT");
vacationalopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_STATUS=Vacational');
  urlJobStatus.onload = function(){
      var JobStatusData = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(JobStatusData);
  };
  urlJobStatus.send();
});

//Job status : Once-Off
var onceOffopt = document.getElementById("onceOffOPT");
onceOffopt.addEventListener("click",function(){
  var urlJobStatus = new XMLHttpRequest();
  urlJobStatus.open('GET','http://lamp.ms.wits.ac.za/~s1879990/JobsExtract.php/?JOB_STATUS=Once-Off');
  urlJobStatus.onload = function(){
      var JobStatusData = JSON.parse(urlJobStatus.responseText);
      HtmlDisplayJob(JobStatusData);
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
    var today = new Date();
    for(i = 0; i < data.length; i++){
      if (new Date(data[i].JOB_DEADLINE) >= today) {

        htmlString += '<div class="jbtitle"><h2>'+ data[i].JOB_TITLE + "</h2></title> <h3> Duration: " + data[i].JOB_STATUS + "</h3> <p> Description: " +
        data[i].JOB_DESC + "</p> <small> Deadline: " + data[i].JOB_DEADLINE + "</small>" +
        '<input id="JOB_ID" class= "jobId" type ="hidden" value="' + data[i].JOB_ID +'">';
      }

  }
  }
  disJobDiv.insertAdjacentHTML('beforeend',htmlString);

}

        


