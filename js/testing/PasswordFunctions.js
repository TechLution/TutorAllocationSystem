function HtmlOutput(data) {
  var htmlString="",hold="";
  hold=data.jobs[0].DEPT_ID;
  if(!hold.localeCompare("false")){
    //alert("wrong password or username");
    htmlString = 'wrong password or username';
  }
  else{
    htmlString = 'ViewJob.html';
    //htmlString = window.location.assign("ViewJob.html");
    //display.insertAdjacentHTML('beforeend',htmlString);
    }
    return htmlString;
}
exports.HtmlOutput=HtmlOutput;

function sHtmlOutput(data,stdNo){
  hold=data.jobs[0].STUDENT_NO;
  var htmlString="";
  if(!hold.localeCompare("false")){
    htmlString='Msg["error"]("Incorrect Username or Password. Please Try Again.")';
    //htmlString = "<p>"+"password doesnt match"+"</p>";
  }
  else{
    sessionStorage.setItem('un',stdNo);
    htmlString = 'window.location.assign("index.html")';
    //display.insertAdjacentHTML('beforeend',htmlString);
    }
    return htmlString;
}
exports.sHtmlOutput=sHtmlOutput;
