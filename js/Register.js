sessionStorage.clear();

let btn = document.getElementById("btnregister");
btn.addEventListener("click", register);


/*
METHOD: passValidate(arg1, arg2) @params :pass, cpass
--checks if the password and the confirm password are equal
--it returns true if the passwords are equal
-- otherwise it returns false
*/
function passValidate(pass, cpass) {
  return pass === cpass;
}


/*METHOD: filled() arg:inputs->array
 *checks if all the inputs in the form are filled
 *returns true if they all are and false otherwise
 */
function filled(inputs) {
  for (i = 0; i < inputs.length; i++) {
    if (inputs[i] == "") {
      return false;
    }
  }
  return true;
}

function ValidateEmail(mail) {

  const corrFormat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return corrFormat.test(String(mail).toLowerCase());
}

/*
METHOD:Register
--registers students to the web's database
*/
function register() {
  //Accessing all the info on the HTML form
  let firstName = document.getElementById('Fname').value;
  let lastName = document.getElementById('Lname').value;
  let mail = document.getElementById('email').value;
  let stdNo = document.getElementById('studentno').value;
  let pwd = document.getElementById('password').value;
  let cpwd = document.getElementById('confirmPassword').value;

  if (!ValidateEmail(mail)) {
    Msg['error']("Please Enter Valid E-mail!");
    return;
  }

  if (!passValidate(pwd, cpwd)) {
    Msg['error']("Passwords don't match!")

  } else {
    //check if all attributes are filled first
    let inputs = new Array(firstName, lastName, mail, stdNo, pwd); //array of the form's inputs
    if (!filled(inputs)) {
      Msg['warning']("Please fill in ALL the fields.");
      return;
    }

    //Register
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/Register.php?" + "fName=" + firstName + "&lName=" + lastName + "&studentNo=" + stdNo + "&email=" + mail + "&pwd=" + cpwd);

    xhr.onload = function () {
      // console.log(this.responseText);
      if (this.responseText == "true") {
        window.location.replace('index.html');
        alert("Registration Successful!");
        window.sessionStorage.setItem('un', stdNo);
      } else {
        Msg['warning']("Something went wrong :(...Please try again!");
      }
    }

    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send();
  }

}
