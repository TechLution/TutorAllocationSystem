let stdnt = document.getElementById("studentlgn");
 let hr = document.getElementById("hrlgn");
  let list = document.getElementById('Nav');
   sessionStorage.setItem("loaded",'false');


 if ("un" in sessionStorage){
   while (stdnt.firstChild && hr.firstChild){
     stdnt.removeChild(stdnt.firstChild);
      hr.removeChild(hr.firstChild);
   }
   let profile = "<li><a :hover id="+"Profile"+" class="+"page-scroll"+">My Profile</a></li>";
    let appView = "<a href="+"viewAppStatus.html"+" class="+"page-scroll>My applications</a>";
     let logout = "<a href="+"StudentLogin.html"+" class="+"page-scroll>Log out</a>";
      stdnt.insertAdjacentHTML('beforeend',appView);
        list.insertAdjacentHTML('afterbegin',profile);
          hr.insertAdjacentHTML('beforeend',logout);

          document.getElementById('Profile').onclick = function(){
            window.location.replace("studentProfile.html");
          };
 }
