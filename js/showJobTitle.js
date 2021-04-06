var jtitle = document.getElementById("jobName");
var jbname = localStorage.getItem("jtitle");
window.addEventListener('load',function(){
    var htmlstr = "<h5>"+jbname+"</h5>"
    jtitle.insertAdjacentHTML('beforeend', htmlstr);
    
});

