
window.addEventListener("load", function(){
    var urlform = new XMLHttpRequest();
    var std_id = sessionStorage.getItem("un");
    var stdIdInt = parseInt(std_id);
    urlform.open('GET', "http://lamp.ms.wits.ac.za/~s1879990/studentPreload.php/?STUDENT_NO="+stdIdInt);
    urlform.onload = function () {
        var resData = JSON.parse(urlform.responseText);
        loadStudentData(resData);
           
    };
    urlform.send();
});

function loadStudentData(Sdata){

    var count = Object.keys(Sdata[0]).length;
    var hold = "";
    hold = Sdata[0].STUDENT_NO;
 
      if (!hold.localeCompare("false")) { 
        alert("no data");
      }else{

        if (count == 5) {
           
              for (i = 0; i < Sdata.length; i++) {
                 
                  var stdNo = Sdata[i].STUDENT_NO;
                  var lname = Sdata[i].REGISTER_LNAME;
                  var fname = Sdata[i].REGISTER_FNAME;
                  var email = Sdata[i].REGISTER_EMAIL;
                  

                  sessionStorage.setItem("sn", stdNo);
                  sessionStorage.setItem("FName", fname);
                  sessionStorage.setItem("LName", lname);
                  sessionStorage.setItem("Email", email);
              }
        }else{
            
                
            for(i = 0;i < Sdata.length; i++){

                var stdNo = Sdata[i].STUDENT_NO;
                var  fname = Sdata[i].STUDENT_FNAME;
                var  lname = Sdata[i].STUDENT_LNAME;
                var  id = Sdata[i].STUDENT_IDorPASS;
                var  dob = Sdata[i].STUDENT_DOB;
                var  gen = Sdata[i].STUDENT_GENDER;
                var  race = Sdata[i].STUDENT_RACE;
                var  mStatus = Sdata[i].STUDENT_MARITAL_STATUS;
                var  hLang = Sdata[i].STUDENT_HOME_LANG;
                var  oLang = Sdata[i].STUDENT_OTHER_LANG;
                var  dis = Sdata[i].STUDENT_DISABILITY;
                var disDesc = Sdata[i].STUDENT_DISABLILITY_DESC;
                var phone = Sdata[i].STUDENT_PHONE_NO;
                var email = Sdata[i].STUDENT_EMAIL;
                var fac = Sdata[i].STUDENT_FACULTY;
                var school = Sdata[i].STUDENT_SCHOOL;
                var yos = Sdata[i].STUDENT_YOS;
                var skill = Sdata[i].STUDENT_SKILLS;

                  sessionStorage.setItem("sn", stdNo);
                  sessionStorage.setItem("FName", fname);
                  sessionStorage.setItem("LName", lname);
                  sessionStorage.setItem("sId",id);
                  sessionStorage.setItem("sDob",dob);
                  sessionStorage.setItem("sGen",gen);
                  sessionStorage.setItem("sRace",race);
                  sessionStorage.setItem("mStat",mStatus);
                  sessionStorage.setItem("HL",hLang);
                  sessionStorage.setItem("FAL",oLang);
                  sessionStorage.setItem("disa",dis);
                  sessionStorage.setItem("disD",disDesc);
                  sessionStorage.setItem("sPhone",phone);
                  sessionStorage.setItem("sFac",fac);
                  sessionStorage.setItem("Email", email);
                  sessionStorage.setItem("sSchool",school);
                  sessionStorage.setItem("sYos", yos);
                  sessionStorage.setItem("sSkill", skill);
            
            }
        }
        
      }

}
