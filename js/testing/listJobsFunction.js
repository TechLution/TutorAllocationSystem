//var disJobDiv = document.getElementById("jobDiv");
function HtmlDisplayJob(data) {
  var htmlString="",hold;
  hold =data.jobs[0].JOB_TITLE;
  if(!hold.localeCompare("false")){
    htmlString = "No available jobs";
  }
  else{
    for(i = 0; i < data.jobs.length; i++){
      htmlString += data.jobs[i].JOB_TITLE+" Duration: "
      +data.jobs[i].JOB_STATUS+" Description: "
      +data.jobs[i].JOB_DESC+" Deadline: "
      +data.jobs[i].JOB_DEADLINE;
    }

  }
  return htmlString;
}
exports.HtmlDisplayJob = HtmlDisplayJob;


 function loadJobTable(res) {
    var  htmlString ="", hold="";
     hold = res.jobs[0].JOB_TITLE;
        if (!hold.localeCompare("false")) {
              htmlString = "<tr><td>" + "No jobs available" + "</td></tr>";
        } else {
             var jobstat;
             var today = new Date();
            for (var i = 0; i < 1; i++) {
                 if (new Date(res.jobs[i].JOB_DEADLINE) < today ) {
                    jobstat = 'In-Active';
                 } else if (new Date(res.jobs[i].JOB_DEADLINE) >= today) {
                     jobstat = 'Active';
                 }
                 htmlString +=  '<tr><td class="col1">' + res.jobs[i].JOB_TITLE +
                     '</td><td class="col2">' + res.jobs[i].JOB_STATUS +
                     '</td><td class="col3">' + res.jobs[i].JOB_DEADLINE +
                     '</td><td class="col4">' + res.jobs[i].NUM_OF_APPS +
                     '</td><td class="col5">' + jobstat +
                     '</td></tr>';
            }
        }
        //postedJobs.insertAdjacentHTML('beforeend', htmlString);
        return htmlString;
 }
 exports.loadJobTable = loadJobTable;
