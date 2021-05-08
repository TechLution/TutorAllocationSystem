function Basic() {
    if (document.getElementById('BCO').checked) {
        document.getElementById('area1').innerHTML=
        '<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area1').innerHTML='';
    }
}

function Into() {
    if (document.getElementById('IAP').checked) {
        document.getElementById('area2').innerHTML=
        '<input name="iapMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area2').innerHTML='';
    }
}

function Disc() {
    if (document.getElementById('DCS').checked) {
        document.getElementById('area3').innerHTML =
        '<input name="dcsMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area3').innerHTML='';
    }
}

function Introduction() {
    if (document.getElementById('IDSA').checked) {
        document.getElementById('area4').innerHTML=
        '<input name="idsaMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area4').innerHTML='';
    }
}


function DatabaseF() {
    if (document.getElementById('DBFA').checked) {
        document.getElementById('area5').innerHTML=
        '<input name="dbfaMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area5').innerHTML='';
    }
}
function Computer() {
    if (document.getElementById('CN').checked) {
        document.getElementById('area9').innerHTML=
        '<input name="cnMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area9').innerHTML='';
    }
}

function MobileC() {
    if (document.getElementById('MC').checked) {
        document.getElementById('area7').innerHTML=
        '<input name="mcMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">';
    } else {
        document.getElementById('area7').innerHTML='';
    }
}
function Analysis() {
    if (document.getElementById('AA').checked) {
        document.getElementById('area8').innerHTML=
        '<input name="aaMark" type="number" id="Lname" class="form-control"  min="0" max="100" required="required">'
        ;
    } else {
        document.getElementById('area8').innerHTML='';
    }
}
