sessionStorage.clear();
var BtnLogin = document.getElementById("mBtnLogin");

BtnLogin.addEventListener("click",function(){

  var urlRequest = new XMLHttpRequest();
  var studentN = document.getElementById("studentno").value;
  //var password = document.getElementById("password").value;
  urlRequest.open('GET',"http://lamp.ms.wits.ac.za/~s1431410/applicantVerify.php/?studentNo="+studentN);

  urlRequest.onload = function(){

      var respond = JSON.parse(urlRequest.responseText);
      HtmlOutput(respond,studentN);
  };
  urlRequest.send();
});

var display = document.getElementById("Test");

function HtmlOutput(data,studenN){
  var hold="";
  var htmlString="";
  hold=data[0].applicant_studentNo;
  if(!hold.localeCompare("false")){
    alert("Incorrect Username or Password. Please Try Again.");
    //htmlString = "<p>"+"password doesnt match"+"</p>";
  }

  else{
    sessionStorage.setItem('un',email);
    htmlString = window.location.assign("memberHomePage.html");
    display.insertAdjacentHTML('beforeend',htmlString);
    }
}
