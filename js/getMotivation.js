window.addEventListener("load", function(){
    var urlRequest = new XMLHttpRequest();
    var studentNo = localStorage.getItem("Sno");
    var studentNoInt = parseInt(studentNo);
    var jobNo = localStorage.getItem("Jid");
    var jobNoInt = parseInt(jobNo);

    urlRequest.open('GET',"http://lamp.ms.wits.ac.za/~s1879990/getMotivation.php/?STUDENT_NO="+studentNoInt+"&JOB_ID="+jobNoInt);
    urlRequest.onload = function(){
        var respond = JSON.parse(urlRequest.responseText);
        getMotivation(respond);
    };
    urlRequest.send();
});

function getMotivation(appData){

      var hold;
      hold = appData[0].STUDENT_NO;
      if (!hold.localeCompare("false")) {
          htmlString = '<tr><td class="col1"> Connection problem</td></tr>';
      }else{
          for(i = 0; i < appData.length;i++){
            localStorage.setItem("Motivation", appData[i].MOTIVATION);
          }
           
      }
}