function displayStatus(arr) {

    //var today = new Date();
   for (var i = 0; i < arr.length; i++) {
        var htmlString = '';
        htmlString +=  '<tr><td class="col1">' + arr[i]["Department"] +
            '</td><td class="col2">' + arr[i]["Job_title"] +
            '</td><td class="col3">' + arr[i]["Job_term"] +
            '</td><td class="col4">' + new Date(arr[i]["Deadline"]) +
            '</td><td class="col5">' + 'submitted' +
            '</td></tr>';
            //tag.insertAdjacentHTML('beforeend', htmlString);
  }
  return htmlString;
}
exports.displayStatus=displayStatus;
