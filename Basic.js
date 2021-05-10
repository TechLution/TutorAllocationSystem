
//when the check box is not checked
function Basic() {
var ht =" ";
var notChecked = "true";
    if (notChecked.localeCompare("true")) {
      ht= " ";
    } else {
        ht=
        '<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">';
    }
    return ht;
}
  module.exports=Basic;

  //when the check box is  checked
  function BasicT() {
  var html ="";
  var checked = true;
      if (checked==true) {
        html=
          '<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">';
      } else {
          html="";
      }
      return html;
  }
    module.exports=BasicT;
