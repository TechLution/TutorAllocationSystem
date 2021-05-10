
//when the check box is not checked
function Basic() {
string html ="";
bool checked = false;
    if (checked!=false) {
      html=
        '<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">';
    } else {
        html='';
    }
    return html;
}
  module.exports=Basic;

  //when the check box is not checked
  function BasicT() {
  string html ="";
  bool checked = true;
      if (checked==true) {
        html=
          '<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">';
      } else {
          html='';
      }
      return html;
  }
    module.exports=BasicT;
