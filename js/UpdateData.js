
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
 //alert('hello');
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

                      document.getElementById("Fname").setAttribute('value',fname);
                      document.getElementById("Lname").setAttribute('value', lname);
                      document.getElementById("studentno").setAttribute('value',stdNo);
                      document.getElementById("email").setAttribute('value', email);
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

 
                  
                        document.getElementById("Fname").value = fname;
                        document.getElementById("Lname").setAttribute('value',lname);
                        document.getElementById("studentno").setAttribute('value', stdNo);
                        document.getElementById("email").setAttribute('value', email);
                        document.getElementById("id_or_passport").setAttribute('value', id);                      
                        document.getElementById("dateofbirth").setAttribute('value',dob);
                        document.getElementById("Contactnumber").setAttribute('value', phone);
                        document.getElementById("Race").value = race;
                        document.getElementById("school").value = school;
                        document.getElementById("yos").value = yos;
                        document.getElementById("HL").value = hLang;
                        document.getElementById("FAL").value = oLang;
                        document.getElementById("skill").value = skill;
                        document.getElementById("faculty").value = fac;
                        document.getElementById("MaritalStatus").value = mStatus;

                                if (gen == 'Male') {
                                    document.getElementById('male').checked = true;
                                } else if (gen == 'Female') {
                                    document.getElementById('female').checked = true;
                                } else {
                                    document.getElementById('other').checked = true;
                                }
                                if (dis == 0) {
                                    document.getElementById('yes').checked = true;
                                    document.getElementById('disabilityspec').value = disDesc;
                                    
                                } else {
                                    document.getElementById('nodisability').checked = true;
                                }
                  
            
            }
        }
        
      }

}
