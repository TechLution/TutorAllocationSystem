function DisplayStudentCV(data) {
  var htmlString="",contacts="",education="",skill;
  var hold="a";
  hold=data[0].STUDENT_NO;
  if(!hold.localeCompare("false")){
    htmlString= '<tr><td class="col1"> Connection problem</td></tr>';
  }
  else{
    for(i = 0; i < data.length; i++){
      var dis;
      if(data[i].STUDENT_DISABILITY == 0){
        dis = data[i].STUDENT_DISABLILITY_DESC;
      }
      else{
        dis="None";
      }
    htmlString += '<ul><li><p>'+data[i].STUDENT_FNAME+
    '</p></li><li><p>'+ data[i].STUDENT_LNAME+
    '</p></li><li><p>'+data[i].STUDENT_IDorPASS+
    '</p></li><li><p>'+data[i].STUDENT_NO+
    '</p></li><li><p>'+data[i].STUDENT_DOB+
    '</p></li><li><p>'+data[i].STUDENT_RACE+
    '</p></li><li><p>'+data[i].STUDENT_GENDER+
    '</p></li><li><p>'+data[i].STUDENT_MARITAL_STATUS+
    '</p></li><li><p>'+data[i].STUDENT_HOME_LANG+
    '</p></li><li><p>'+data[i].STUDENT_OTHER_LANG+
    '</p></li><li><p>'+dis+
    '</p></li></ul><br><br>';
    contacts+= '<ul><li><p>'+data[i].STUDENT_EMAIL+
    '</p></li><li><p>'+data[i].STUDENT_PHONE_NO+
    '</p></li></ul>';

    education += '<ul><li><p>'+data[i].STUDENT_FACULTY+
    '</p></li><li><p>'+data[i].STUDENT_SCHOOL+
    '</p></li><li><p>'+data[i].STUDENT_YOS+
    '</p></li></ul>';

    skill+= '<p class="paragraph">'+data[i].STUDENT_SKILLS+'</p>';
    //localStorage.setItem("Motivation",data[i].STUDENT_MOTIVATION);
    }

      //htmlString1 = window.location.assign("index.html");
    display.insertAdjacentHTML('beforeend',htmlString);
    displayContacts.insertAdjacentHTML('beforeend',contacts);
    displayEducation.insertAdjacentHTML('beforeend',education);
    displaySkill.insertAdjacentHTML('beforeend',skill);

  }
}
