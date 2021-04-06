window.addEventListener("load", function(){
    var urlRequest = new XMLHttpRequest();
    var studentNo = localStorage.getItem("Sno");
    var studentNoInt = parseInt(studentNo);

    urlRequest.open('GET',"http://lamp.ms.wits.ac.za/~s1879990/showfiles.php/?STUDENT_NO="+studentNoInt);
    urlRequest.onload = function(){
        var respond = JSON.parse(urlRequest.responseText);
         loadTable(respond);
    };
    urlRequest.send();
});
var postedDocs = document.getElementById("tableBody");

  

 function loadTable(res) {
    var  htmlString ="", hold="";

     hold = res[0].FILE_ID;
        if (!hold.localeCompare("false")) {
              htmlString = "<tr><td>" + "No Additional documents submitted" + "</td></tr>";

        } else {

            for (var i = 0; i < res.length; i++) {
              var num=i+1;
            if (i==0){
                 htmlString += '<tr class="col1" ><td class="col1">' + num +
                      '</a></td><td class="col1">' + res[i].FILE_ID +
                     '</td><td class="col2">' + res[i].FILE_NAME +
                     '</td><td class="col4" onclick=" "><a href="AdditionalDocList.html">' +  "Open"+
                      '</td></tr>';
                    }else if(i==1){

                      htmlString += '<tr class="col1" ><td class="col1">' + num +
                            '</a></td><td class="col2">' + res[i].REG_ID +
                          '</td><td class="col2">' + res[i].REG_NAME +
                           '</td><td class="col4" onclick=" "><a href="AdditionalDocList.html">' +  "Open"+
                           '</td></tr>';
                    }
                }
            postedDocs.insertAdjacentHTML('beforeend', htmlString);

      }

 }
